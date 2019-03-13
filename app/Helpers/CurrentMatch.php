<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\Match;

class CurrentMatch
{
    private $match;
    protected $current_inning;

    protected function __construct(Match $match) {
        $this->match = $match;
        /* Call the currentInning Constructor to create the ongoing inning for the match*/
        $this->current_inning = new CurrentInning($match->currentInning);
    }
}