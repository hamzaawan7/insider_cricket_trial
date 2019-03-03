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

if (!function_exists('goodBowlData')) {
    function goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership)
    {
        $inning->overs = round($inning->overs, 1) + 0.1;
        $inning->run_rate = calculateRunRate($inning->runs, $inning->overs);
        /*$inning->save();*/

        $current_onstrike_batsman->balls = $current_onstrike_batsman->balls + 1;
        $current_onstrike_batsman->strike_rate = calculateStrikeRate($current_onstrike_batsman->runs, $current_onstrike_batsman->balls);
        $current_onstrike_batsman->save();

        $current_bowler->overs = round($current_bowler->overs, 1) + 0.1;
        $current_bowler->zeros = $current_bowler->zeros + 1;
        $current_bowler->economy = calculateEconomy($current_bowler->runs, $current_bowler->overs);
        $current_bowler->save();

        $current_partnership->balls_faced = $current_bowler->zeros + 1;
        $current_partnership->balls_faced = calculateStrikeRate($current_partnership->runs_contribution, $current_partnership->balls_faced);
        /*$current_partnership->save();*/
    }
}

if (!function_exists('changeBowler')) {
    function changeBowler($current_bowler, $inning)
    {
        $inning->overs = round($inning->overs);
        $current_bowler->overs = round($current_bowler->overs);
        $current_bowler->has_bowled_previous_over = 1;
        /*$current_bowler->save();*/
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
        /*$current_bowler->save();*/

        if ($has_bowled) {
            $current_bowler = MatchInningBowler::where(['bowler_id' => $bowler_id])
                ->where(['inning_id' => $inning->id])
                ->first();
            $current_bowler->is_bowling = 1;
            /*$current_bowler->save();*/
        } else {
            $current_bowler = new MatchInningBowler();
            $current_bowler->inning_id = $inning->id;
            $current_bowler->bowler_id = $bowler_id;
            $current_bowler->save();
        }

        $inning->current_bowling_bowler_id = $current_bowler->id;
        /*$inning->save();*/
    }
}