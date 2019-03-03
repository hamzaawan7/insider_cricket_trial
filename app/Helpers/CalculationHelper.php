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

if (!function_exists('calculateStrikeRate')) {
    function calculateStrikeRate($runs, $balls)
    {
        return round(($runs / $balls) * 100, 2);
    }
}

if (!function_exists('calculateEconomy')) {
    function calculateEconomy($runs, $overs)
    {
        $arr = explode(".", round($overs, 1));
        $balls = ($arr[0] * 6) + $arr[1];
        return round(($runs / $balls), 2);
    }
}

if (!function_exists('calculateRunRate')) {
    function calculateRunRate($runs, $overs)
    {
        return round($runs / $overs, 2);
    }
}