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

/* calculate strike rate*/
if (!function_exists('calculateStrikeRate')) {
    function calculateStrikeRate($runs, $balls)
    {
        if($balls != 0){
            return round(($runs / $balls) * 100, 2);
        }
        return 0;
    }
}

/* calculate economy of a bowler*/
if (!function_exists('calculateEconomy')) {
    function calculateEconomy($runs, $overs)
    {
        $arr = explode(".", round($overs, 1));
        if($arr[0] != 0 && $arr[1] != 0){
            $balls = ($arr[0] * 6) + $arr[1];
            return round(($runs / $balls), 2);
        }
        return 0;
    }
}

/* calculate runrate of team*/
if (!function_exists('calculateRunRate')) {
    function calculateRunRate($runs, $overs)
    {
        if($overs != 0){
            return round($runs / $overs, 2);
        }
        return 0;
    }
}