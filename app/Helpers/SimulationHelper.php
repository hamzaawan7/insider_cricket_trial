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


/* This is the basic function for simulation */
/* It calls different functions on the basis of the event happened*/
/* This works according to the bowling_rate, the bigger the bowling rate the slower this algo*/
/* Can be more optimized if given time*/
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
                    goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership, 1);
                    changeBowlingRate($inning, "dot");
                    break;
                case 1:
                    $score = whichRun();
                    switch ($score) {
                        case 0:
                            $end = updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 1);
                            crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning);
                            changeBowlingRate($inning, "single");
                            break;
                        case 1:
                            $end = updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 2);
                            break;
                        case 2:
                            $end = updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 3);
                            crossing($current_onstrike_batsman, $current_nonstrike_batsman, $inning);
                            break;
                    }
                    goodBowlDataUpdate($inning, $current_onstrike_batsman, $current_bowler, $current_partnership);
                    break;
                case 2:
                    $score = whichBoundary();
                    switch ($score) {
                        case 0:
                            $end = updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 4);
                            changeBowlingRate($inning, "four");
                            break;
                        case 1:
                            $end = updateScore($current_onstrike_batsman, $current_bowler, $current_partnership, $inning, 6);
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
                case 4:
                    $extra = howExtra();
                    switch ($extra) {
                        case 0:
                            $end = addExtraScore($current_extra_record, $current_bowler, $inning, 0);
                            break;
                        case 1:
                            $end = addExtraScore($current_extra_record, $current_bowler, $inning, 1);
                            break;
                        case 2:
                            $end = addExtraScore($current_extra_record, $current_bowler, $inning, 2);
                            break;
                    }
                    break;
                case 5:
                    changeBowlingRate($inning, "nothing");
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
            $current_onstrike_batsman->save();
            $current_nonstrike_batsman->save();
            $current_bowler->save();
            $current_extra_record->save();
            $current_partnership->save();
            $inning->save();
        }
    }
}