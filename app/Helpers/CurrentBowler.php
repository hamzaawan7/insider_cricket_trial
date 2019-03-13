<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\MatchInningBowler;

class CurrentBowler extends CurrentInning
{
    private $bowler;

    protected function __construct(MatchInningBowler $bowler) {
        parent::__construct($bowler->matchInning);
        $this->bowler= $bowler;
        $this->bowler->save();
    }

    /* Bowler stats update logic goes here */

    public function addBowlerScore($runs){
        $this->bowler->runs = $this->bowler->runs + $runs;
        $this->bowler->save();
    }

    private function addBowlerFour(){
        $this->bowler->fours++;
        $this->bowler->save();
    }

    private function addBowlerSix(){
        $this->bowler->sixes++;
        $this->bowler->save();
    }

    public function addBowlerBall(){
        $this->bowler->overs = $this->bowler->overs + 0.1;
        if($this->checkOverEnd($this->bowler->overs)){
            $this->bowler->overs = round($this->bowler->overs);
        }
    }

    public function changeBowler($player_id, $has_bowled){
        if($has_bowled){
            $b = MatchInningBowler::where(['bowler_id' => $player_id])->where(['inning_id' => $this->inning->id])->first();
            $b->is_bowling = 1;
            $b->save();
        } else {
            $b = new MatchInningBowler();
            $b->inning_id = $this->inning->id;
            $b->bowler_id = $player_id;
            $b->save();
        }
        $this->bowler = $b;
        return $b;
    }
}