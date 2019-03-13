<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\MatchInningBatsman;

class CurrentOnstrikeBatsman extends CurrentInning
{
    private $batsman;

    protected function __construct(MatchInningBatsman $batmsan) {
        parent::__construct($batmsan->matchInning);
        $this->inning->last_batting_order++;
        $this->batsman = $batmsan;
        $this->inning->current_onstrike_batsman_id = $this->batsman->id;
    }

    /* Batsman stats update logic goes here */

    public function addBatsmanScore($runs){
        $this->batsman->runs = $this->batsman->runs + $runs;
    }

    public function addBatsmanBall(){
        $this->batsman->balls = $this->batsman->balls + 1;
    }

    public function gotoNonstrikeEnd(){
        $this->batsman->is_on_strike = 0;
        $temp = $this->nonstrike_batsman;
        $this->nonstrike_batsman = $this->batsman;
        $this->batsman = $temp;
        $this->onstrike_batsman = $this->batsman;
    }

    public function out(){
        $this->batsman->is_on_strike = 0;
        $this->batsman->has_batted = 1;
    }

    public function createNewBatsman($player_id){
        $mib = new MatchInningBatsman();
        $mib->inning_id = $this->inning->id;
        $mib->batsman_id = $player_id;
        $mib->save();
        return $mib;
    }
}