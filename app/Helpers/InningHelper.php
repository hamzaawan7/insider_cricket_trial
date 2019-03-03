<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 02/03/2019
 * Time: 6:03 PM
 */

use App\MatchInning;
use App\MatchInningBatsman;
use App\MatchInningBowler;
use App\MatchInningExtra;
use App\MatchInningFow;
use App\MatchInningPartnership;
use App\Player;
use App\Standing;

/* start a new innings, introduce pair of batsman, a bowler, a partnership, and a record for innings extras which will be updated live*/
if (!function_exists('start_innings')) {
    function start_innings($match, $number = 1)
    {
        $inning = new MatchInning();
        $inning->match_id = $match->id;
        $inning->batting_team_id = ($number == 1) ? $match->team1_id : $match->team2_id;
        $inning->fielding_team_id = ($number == 1) ? $match->team2_id : $match->team1_id;
        $inning->number = $number;
        if($number == 2){
            foreach ($match->matchInnings as $in){
                $inning->target = $in->runs + 1;
                break;
            }
        }
        if ($inning->save()) {
            $batsman1 = new MatchInningBatsman();
            $batsman1->inning_id = $inning->id;
            $batsman1->batsman_id = getBatsman($inning, $inning->batting_team_id);
            $batsman1->save();

            $batsman2 = new MatchInningBatsman();
            $batsman2->inning_id = $inning->id;
            $batsman2->batsman_id = getBatsman($inning, $inning->batting_team_id);
            $batsman2->is_on_strike = 0;
            $batsman2->save();

            $partnership = new MatchInningPartnership();
            $partnership->inning_id = $inning->id;
            $partnership->batsman1_id = $batsman1->batsman_id;
            $partnership->batsman2_id = $batsman2->batsman_id;
            $partnership->save();

            $bowler = new MatchInningBowler();
            $bowler->inning_id = $inning->id;
            $bowler->bowler_id = getBowler($inning, $inning->fielding_team_id);
            $bowler->save();

            $extra = new MatchInningExtra();
            $extra->inning_id = $inning->id;
            $extra->save();

            $inning->last_batting_order = $batsman2->batsman->batting_order;
            $inning->current_onstrike_batsman_id = $batsman1->id;
            $inning->current_nonstrike_batsman_id = $batsman2->id;
            $inning->current_bowling_bowler_id = $bowler->id;
            $inning->current_extra_record_id = $extra->id;
            $inning->current_partnership_id = $partnership->id;
            $inning->save();
        }
        $match->current_innings_id = $inning->id;
        $match->save();
    }
}

/* end the innings and see if the ended inning was a 1st or 2nd*/
/* if 1st start second inning*/
/* if 2nd end the match and change standings table accordingly*/
if (!function_exists('endInnings')) {
    function endInnings($inning)
    {
        $inning->is_completed = 1;
        $inning->save();
        $match = $inning->match;
        if ($inning->number != 2) {
            /* Check If First Innings, if so create new Innings*/
            start_innings($match, 2);
            return;
        } else {
            /* Check If Second Innings, if so create new Innings*/
            $winner = 0;
            $loser = 0;
            if ($inning->runs >= $inning->target) {
                $winner = $inning->match->team2_id;
                $loser = $inning->match->team1_id;
            } else if ($inning->runs < $inning->target - 1) {
                $winner = $inning->match->team1_id;
                $loser = $inning->match->team2_id;
            }
            $match->winner_team_id = $winner;
            $match->match_status_id = 3;
            $match->save();
            changeStandings($match->winner_team_id, $loser);
            return;
        }
    }
}

/* the extras score has to be added against a team and innings in this function*/
if (!function_exists('addExtraScore')) {
    function addExtraScore($current_extra_record, $current_bowler, $inning, $how)
    {
        if ($how == 0) {
            $current_extra_record->wides = $current_extra_record->wides + 1;
        } else if ($how == 1) {
            $current_extra_record->no_balls = $current_extra_record->no_balls + 1;
        }
        $current_extra_record->total = $current_extra_record->total + 1;
        /*$current_extra_record->save();*/

        $current_bowler->runs = $current_bowler->runs + 1;
        /*$current_bowler->save();*/

        $inning->runs = $inning->runs + 1;
        /*$inning->save();*/

        if ($inning->number == 2 && $inning->runs >= $inning->target->runs) {
            endInnings($inning);
            return true;
        }

        return false;
    }
}

/* change the bowling_rate, depending on the event, explained thoroughly in the github documentation*/
if (!function_exists('changeBowlingRate')) {
    function changeBowlingRate($inning, $code)
    {
        $arr = getBowlingRateCode($code);
        if ($arr['is_increase']) {
            $inning->bowling_rate = round($inning->bowling_rate + $arr['rate'], '1');
        } else {
            $inning->bowling_rate = round($inning->bowling_rate - $arr['rate'], '1');
            if ($inning->bowling_rate < 1) {
                $inning->bowling_rate = 1;
            }
        }
    }
}

/* update score, batsman and bowling stats if a run or a boundary has been scored */
if (!function_exists('updateScore')) {
    function updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, $score)
    {
        $current_onstrike_batsman->runs = $current_onstrike_batsman->runs + $score;
        if ($score == 4) {
            $current_onstrike_batsman->fours = $current_onstrike_batsman->fours + 1;
        }
        if ($score == 6) {
            $current_onstrike_batsman->sixes = $current_onstrike_batsman->sixes + 1;
        }
        /*$current_onstrike_batsman->save();*/

        $current_bowler->runs = $current_bowler->runs + $score;
        if ($score == 4) {
            $current_bowler->fours = $current_bowler->fours + 1;
        }
        if ($score == 6) {
            $current_bowler->sixes = $current_bowler->sixes + 1;
        }
        /*$current_bowler->save();*/

        $current_partnership->runs_contribution = $current_partnership->runs_contribution + $score;
        $current_partnership->balls_faced = $current_partnership->balls_faced + 1;
        $current_partnership->strike_rate = calculateStrikeRate($current_partnership->runs_contribution, $current_partnership->balls_faced);
        /*$current_partnership->save();*/

        $inning->runs = $inning->runs + $score;
        /*$inning->save();*/

        if ($inning->number == 2 && $inning->runs >= $inning->target) {
            endInnings($inning);
            return true;
        }

        return false;
    }
}

/* crossing at the end of an over is acheived by this function*/
if (!function_exists('crossing')) {
    function crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning)
    {
        $current_onstrike_batsman->is_on_strike = 0;
        /*$current_onstrike_batsman->save();*/

        $current_nonstrike_batsman->is_on_strike = 1;
        /*$current_nonstrike_batsman->save();*/

        $temp = $current_onstrike_batsman;
        $current_onstrike_batsman = $current_nonstrike_batsman;
        $current_nonstrike_batsman = $temp;
        $inning->current_onstrike_batsman_id = $current_onstrike_batsman->id;
        $inning->current_nonstrike_batsman_id = $current_nonstrike_batsman->id;
        /*$inning->save();*/
    }
}

if (!function_exists('checkOverEnd')) {
    function checkOverEnd($overs)
    {
        $arr = explode(".", round($overs, 1));
        if ($arr[1] == 6) {
            return true;
        }
        return false;
    }
}

/* check if the innings has ended by 20 overs completion*/
if (!function_exists('checkInningEnd')) {
    function checkInningEnd($overs)
    {
        $arr = explode(".", round($overs, 1));
        if ($arr[0] == Config::get('constants.match_over_limit') - 1) {
            return true;
        }
        return false;
    }
}

/* change the standings after the match has been finished*/
if (!function_exists('changeStandings')) {
    function changeStandings($winner, $loser)
    {
        $standing = Standing::where(['team_id' => $winner])->first();
        $standing->matches_played = $standing->matches_played + 1;
        $standing->won = $standing->won + 1;
        $standing->points = $standing->points + 3;
        $standing->save();

        $standing = Standing::where(['team_id' => $loser])->first();
        $standing->matches_played = $standing->matches_played + 1;
        $standing->lost = $standing->lost + 1;
        $standing->save();
    }
}