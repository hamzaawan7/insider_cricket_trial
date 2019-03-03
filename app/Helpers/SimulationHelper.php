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

if (!function_exists('simulate')) {
    function simulate($inning)
    {
        $current_onstrike_batsman = $inning->currentOnstrikeBatsman;
        $current_nonstrike_batsman = $inning->currentNonstrikeBatsman;
        $current_bowler = $inning->currentBowlingBowler;
        $current_extra_record = $inning->currentExtraRecord;
        $current_partnership = $inning->currentPartnership;
        $end = false;
        for ($i = 0; $i < floor($inning->bowling_rate); $i++) {
            $event = whatHappened();
            switch ($event) {
                case 0:
                    goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership);
                    changeBowlingRate($inning, "dot");
                    break;
                case 1:
                    $score = whichRun();
                    switch ($score) {
                        case 0:
                            updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 1);
                            crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning);
                            changeBowlingRate($inning, "single");
                            break;
                        case 1:
                            updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 2);
                            break;
                        case 2:
                            updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 3);
                            crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning);
                            break;
                    }
                    goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership);
                    break;
                case 2:
                    $score = whichBoundary();
                    switch ($score) {
                        case 0:
                            updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 4);
                            changeBowlingRate($inning, "four");
                            break;
                        case 1:
                            updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 6);
                            changeBowlingRate($inning, "six");
                            break;
                    }
                    goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership);
                    break;
                case 3:
                    $wicket = howOut();
                    switch ($wicket) {
                        case 0:
                            $end = changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, 1);
                            break;
                        case 1:
                            $end = changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, 1);
                            break;
                        case 2:
                            $end = changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, 1);
                            break;
                        case 3:
                            $end = changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, 0);
                            break;
                        case 4:
                            $end = changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, 0);
                            break;
                    }
                    goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership);
                    break;
            }

            if ($end) {
                return;
            }

            if (checkInningEnd($inning->overs)) {
                endInnings($inning);
                return;
            }

            if (checkOverEnd($inning->overs)) {
                /* Assign Bowler after Over end */
                changeBowler($current_bowler, $inning);
                /* Crossing Batsman */
                crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning);
            }
        }
    }
}

if (!function_exists('howOut')) {
    function howOut()
    {
        return array_rand(array(
            0 => "bold",
            1 => "caught",
            2 => "lbw",
            3 => "runout",
            4 => "stumps",
        ));
    }
}

if (!function_exists('endInnings')) {
    function endInnings($inning)
    {
        $inning->is_completed = 1;
        $inning->save();
        $match = $inning->match;
        if ($inning->number != 2) {
            start_innings($match, 2);
        } else {
            $match->winner_team_id = ($match->matchInnings[0]->runs >= $match->matchInnings[1]->runs) ? $match->matchInnings[1]->team1_id : $match->matchInnings[1]->team2_id;
            $match->match_status_id = 3;
            $match->save();
        }
    }
}

if (!function_exists('whatHappened')) {
    function whatHappened()
    {
        return array_rand(array(
            0 => "dot",
            1 => "runs_scored",
            2 => "boundary",
            3 => "wicket",
            /*4 => "extra",
            5 => "nothing",*/
        ));
    }
}

if (!function_exists('whichRun')) {
    function whichRun()
    {
        return array_rand(array(
            0 => "1",
            1 => "2",
            2 => "3"
        ));
    }
}

if (!function_exists('whichBoundary')) {
    function whichBoundary()
    {
        return array_rand(array(
            0 => "4",
            1 => "6"
        ));
    }
}

if (!function_exists('changeBowlingRate')) {
    function changeBowlingRate($inning, $code)
    {
        /*$arr = getBowlingRateCode($code);
        if($arr['is_increase']){
            $inning->bowling_rate = round($inning->bowling_rate + $arr['rate'], '1');
        } else {
            $inning->bowling_rate = round($inning->bowling_rate - $arr['rate'], '1');
        }*/
    }
}


if (!function_exists('getBowlingRateCodeRate')) {
    function getBowlingRateCode($code)
    {
        $array = array(
            "dot" => [
                'rate' => 0.1,
                'is_increase' => 1,
            ],
            "single" => [
                'rate' => 0.1,
                'is_increase' => 1,
            ],
            "four" => [
                'rate' => 0.1,
                'is_increase' => 0,
            ],
            "six" => [
                'rate' => 0.1,
                'is_increase' => 0,
            ],
            "nothing" => [
                'rate' => 0.1,
                'is_increase' => 0,
            ],
        );
        return $array[$code];
    }
}

if (!function_exists('start_innings')) {
    function start_innings($match, $number = 1)
    {
        $inning = new MatchInning();
        $inning->match_id = $match->id;
        $inning->batting_team_id = ($number == 1) ? $match->team1_id : $match->team2_id;
        $inning->fielding_team_id = ($number == 1) ? $match->team2_id : $match->team1_id;
        $inning->number = $number;
        $inning->target = ($number == 2) ? $match->matchInnings[0]->runs + 1 : null;
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
            $partnership->batsman1_id = $batsman1->id;
            $partnership->batsman2_id = $batsman2->id;
            $partnership->save();

            $bowler = new MatchInningBowler();
            $bowler->inning_id = $inning->id;
            $bowler->bowler_id = getBowler($inning, $inning->fielding_team_id);
            $bowler->save();

            $extra = new MatchInningExtra();
            $extra->inning_id = $inning->id;
            $extra->save();

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

if (!function_exists('getBatsman')) {
    function getBatsman($inning, $team_id)
    {
        $players = Player::where(['team_id' => $team_id])->orderBy('batting_order', 'asc')->get();
        if (!empty($players)) {
            foreach ($players as $player) {
                $inning_player = MatchInningBatsman::where(['batsman_id' => $player->id])->where(['inning_id' => $inning->id])->first();
                if (empty($inning_player)) {
                    return $player->id;
                }
            }
        }
        return false;
    }
}

if (!function_exists('getBowler')) {
    function getBowler($inning, $team_id)
    {
        $players = Player::where(['team_id' => $team_id])->orderBy('batting_order', 'desc')->get();
        if (!empty($players)) {
            foreach ($players as $player) {
                $inning_player = MatchInningBowler::where(['bowler_id' => $player->id])->where(['inning_id' => $inning->id])->first();
                if (!empty($inning_player)) {
                    if (round($inning_player->overs) != Config::get('constants.max_over_limit') && !$inning_player->has_bowled_previous_over) {
                        return $player->id;
                    }
                } else {
                    return $player->id;
                }
            }
        }
        return false;
    }
}

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
        $current_onstrike_batsman->save();

        $current_bowler->runs = $current_bowler->runs + $score;
        if ($score == 4) {
            $current_bowler->fours = $current_bowler->fours + 1;
        }
        if ($score == 6) {
            $current_bowler->sixes = $current_bowler->sixes + 1;
        }
        $current_bowler->save();

        $current_partnership->runs_contribution = $current_partnership->runs_contribution + $score;
        $current_partnership->save();

        $inning->runs = $inning->runs + $score;
        $inning->save();
    }
}

if (!function_exists('goodBowlData')) {
    function goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership)
    {
        $inning->overs = round($inning->overs, 1) + 0.1;
        $inning->run_rate = calculateRunRate($inning->runs, $inning->overs);
        $inning->save();

        $current_onstrike_batsman->balls = $current_onstrike_batsman->balls + 1;
        $current_onstrike_batsman->strike_rate = calculateStrikeRate($current_onstrike_batsman->runs, $current_onstrike_batsman->balls);
        $current_onstrike_batsman->save();

        $current_bowler->overs = round($current_bowler->overs, 1) + 0.1;
        $current_bowler->zeros = $current_bowler->zeros + 1;
        $current_bowler->economy = calculateEconomy($current_bowler->runs, $current_bowler->overs);
        $current_bowler->save();

        $current_partnership->balls_faced = $current_bowler->zeros + 1;
        $current_partnership->balls_faced = calculateStrikeRate($current_partnership->runs_contribution, $current_partnership->balls_faced);
        $current_partnership->save();
    }
}

if (!function_exists('changeBowler')) {
    function changeBowler($current_bowler, $inning)
    {
        $inning->overs = round($inning->overs);
        $current_bowler->overs = round($current_bowler->overs);
        $current_bowler->has_bowled_previous_over = 1;
        $current_bowler->save();
        /* Assigning new Bowler */
        $bowler_id = getBowler($inning, $inning->fielding_team_id);
        $has_bowled = false;
        foreach ($inning->matchInningBowlers as $inningBowler) {
            $inningBowler->has_bowled_previous_over = 0;
            $inningBowler->save();
            if ($inningBowler->bowler_id == $bowler_id && $inningBowler->id != $current_bowler->id) {
                $has_bowled = true;
            }
        }
        $current_bowler->is_bowling = 0;
        $current_bowler->has_bowled_previous_over = 1;
        $current_bowler->save();

        if ($has_bowled) {
            $current_bowler = MatchInningBowler::where(['bowler_id' => $bowler_id])
                ->where(['inning_id' => $inning->id])
                ->first();
            $current_bowler->is_bowling = 1;
            $current_bowler->save();
        } else {
            $current_bowler = new MatchInningBowler();
            $current_bowler->inning_id = $inning->id;
            $current_bowler->bowler_id = $bowler_id;
            $current_bowler->save();
        }

        $inning->current_bowling_bowler_id = $current_bowler->id;
        $inning->save();
    }
}

if (!function_exists('changeBatsman')) {
    function changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, $is_bowler_bowled)
    {
        $current_onstrike_batsman->is_on_strike = 0;
        $current_onstrike_batsman->is_batting = 0;
        if ($is_bowler_bowled) {
            $current_onstrike_batsman->bowled_by_id = $current_bowler->bowler_id;
        }
        if ($current_onstrike_batsman->save()) {
            $current_bowler->wickets = $current_bowler->wickets + 1;
            $current_bowler->save();

            $inning->wickets = $inning->wickets + 1;
            $inning->save();

            $fow = new MatchInningFow();
            $fow->inning_id = $inning->id;
            $fow->bowled_by_id = $current_bowler->bowler_id;
            $fow->number = $inning->wickets;
            $fow->runs = $inning->runs;
            $fow->overs = round($inning->overs, 1);
            if ($fow->save()) {
                if ($inning->wickets == 10) {
                    endInnings($inning);
                    return true;
                }
                /* Assigning new Batsman */
                $batsman_id = getBatsman($inning, $inning->batting_team_id);

                $current_onstrike_batsman = new MatchInningBatsman();
                $current_onstrike_batsman->inning_id = $inning->id;
                $current_onstrike_batsman->batsman_id = $batsman_id;
                $current_onstrike_batsman->save();

                $current_partnership = new MatchInningPartnership();
                $current_partnership->inning_id = $inning->id;
                $current_partnership->batsman1_id = $current_nonstrike_batsman->id;
                $current_partnership->batsman2_id = $current_onstrike_batsman->id;
                $current_partnership->save();

                $inning->current_onstrike_batsman_id = $current_onstrike_batsman->id;
                $inning->save();
            }
        }
        return false;
    }
}

if (!function_exists('crossing')) {
    function crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning)
    {
        $current_onstrike_batsman->is_on_strike = 0;
        $current_onstrike_batsman->save();

        $current_nonstrike_batsman->is_on_strike = 1;
        $current_nonstrike_batsman->save();

        $temp = $current_onstrike_batsman;
        $current_onstrike_batsman = $current_nonstrike_batsman;
        $current_nonstrike_batsman = $temp;
        $inning->current_onstrike_batsman_id = $current_onstrike_batsman->id;
        $inning->current_nonstrike_batsman_id = $current_nonstrike_batsman->id;
        $inning->save();
    }
}

if (!function_exists('calculateStrikeRate')) {
    function calculateStrikeRate($runs, $balls)
    {
        return round(($runs / $balls) * 100, 2);
    }
}

if (!function_exists('calculateEconomy')) {
    function calculateEconomy($runs, $overs)
    {
        $over = floor($overs);      // 1
        $ball = $overs - $over; // .25
        $balls = ($over * 6) + $ball;
        return round(($runs / $balls), 2);
    }
}

if (!function_exists('calculateRunRate')) {
    function calculateRunRate($runs, $overs)
    {
        return round($runs / $overs, 2);
    }
}

if (!function_exists('checkOverEnd')) {
    function checkOverEnd($overs)
    {
        $arr = explode(".", $overs);
        if ($arr[1] == 6) {
            return true;
        }
        return false;
    }
}

if (!function_exists('checkInningEnd')) {
    function checkInningEnd($overs)
    {
        $arr = explode(".", $overs);
        if ($arr[0] == Config::get('constants.match_over_limit') - 1) {
            return true;
        }
        return false;
    }
}