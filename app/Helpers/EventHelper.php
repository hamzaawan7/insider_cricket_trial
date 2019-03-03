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

/* This file contains all the events that occur and their codes which are used in the simulation function*/

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

if (!function_exists('howExtra')) {
    function howExtra()
    {
        return array_rand(array(
            0 => "wd",
            1 => "nb",
            2 => "lb"
        ));
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
            4 => "extra",
            5 => "nothing",
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