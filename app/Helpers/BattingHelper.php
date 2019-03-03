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

/* Create the first two new batsman, see if they are not already batting*/
if (!function_exists('getBatsman')) {
    function getBatsman($inning, $team_id)
    {
        $players = Player::where(['team_id' => $team_id])->orderBy('batting_order', 'asc')->get();
        foreach ($players as $player) {
            $inning_player = MatchInningBatsman::where(['batsman_id' => $player->id])->where(['inning_id' => $inning->id])->first();
            if (empty($inning_player)) {
                return $player->id;
            }
        }
        return false;
    }
}

/* After the fall of wicket we need to send the out batsman back to paivllion and introduce new onw*/
/* Also if he was lbe, b or caught then assign bowled_by_bowler id to the out batsman */
/* Introduce the partnership between the new and nonstrike batsman*/
if (!function_exists('changeBatsman')) {
    function changeBatsman($current_onstrike_batsman, $current_nonstrike_batsman, $current_bowler, $current_partnership, $inning, $is_bowler_bowled)
    {
        $current_onstrike_batsman->is_on_strike = 0;
        $current_onstrike_batsman->is_batting = 0;
        $current_onstrike_batsman->has_batted = 1;
        $current_onstrike_batsman->balls = $current_onstrike_batsman->balls + 1;
        if ($is_bowler_bowled) {
            $current_onstrike_batsman->bowled_by_id = $current_bowler->bowler_id;
        }
        $current_onstrike_batsman->save();

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
        $fow->save();
        if ($inning->wickets == 10) {
            endInnings($inning);
            return true;
        }
        /* Assigning new Batsman */
        $batsman = newBatsman($inning);

        $current_onstrike_batsman = new MatchInningBatsman();
        $current_onstrike_batsman->inning_id = $inning->id;
        $current_onstrike_batsman->batsman_id = $batsman->id;
        $current_onstrike_batsman->save();

        $partnership = new MatchInningPartnership();
        $partnership->inning_id = $inning->id;
        $partnership->batsman1_id = $current_nonstrike_batsman->batsman_id;
        $partnership->batsman2_id = $current_onstrike_batsman->batsman_id;
        $partnership->save();

        $current_partnership = $partnership;


        $inning->last_batting_order = $batsman->batting_order;
        $inning->current_onstrike_batsman_id = $current_onstrike_batsman->id;
        $inning->current_partnership_id = $current_partnership->id;
        /*$inning->save();*/

        foreach ($inning->matchInningBatsmens as $batsmen){
            if(($batsmen->batsman_id == $partnership->batsman1_id) || ($batsmen->batsman_id == $partnership->batsman2_id)){
                $batsmen->is_batting = 1;
                $batsmen->has_batted = 0;
                $batsmen->save();
                continue;
            }
            $batsmen->is_batting = 0;
            $batsmen->has_batted = 1;
            $batsmen->save();
        }
        return false;
    }
}

/* Query to find new batsman in place of the one who just got out*/
if (!function_exists('newBatsman')) {
    function newBatsman($inning)
    {
        return Player::where(['team_id' => $inning->battingTeam->id])
            ->where(['batting_order' => $inning->last_batting_order + 1])
            ->first();
    }
}