<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\MatchInningBatsman;

class CurrentNonstrikeBatsman extends CurrentInning
{
    private $batsman;

    protected function __construct(MatchInningBatsman $batmsan) {
        parent::__construct($batmsan->matchInning);
        $this->inning->last_batting_order++;
        $this->batsman = $batmsan;
        $this->inning->current_nonstrike_batsman_id = $this->batsman->id;
    }

    /* Batsman stats update logic goes here */

    public function gotoOnstrikeEnd(){
        $this->batsman->is_on_strike = 1;
        $temp = $this->nonstrike_batsman;
        $this->onstrike_batsman = $this->batsman;
        $this->batsman = $temp;
        $this->nonstrike_batsman = $this->batsman;
    }
}