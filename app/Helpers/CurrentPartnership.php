<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\MatchInningPartnership;

class CurrentPartnership extends CurrentInning
{
    private $partnership;

    protected function __construct(MatchInningPartnership $partnership) {
        parent::__construct($partnership->matchInning);
        $this->partnership = $partnership;
        $this->inning->current_partnership_id = $this->partnership->id;
    }

    /* Partnership stats logic goes here */

    public function addPartnershipRunsContribution($runs){
        $this->partnership->runs_contribution = $this->partnership->runs_contribution + $runs;
    }

    public function addPartnershipBallsFaced(){
        $this->partnership->balls_faced = $this->partnership->runs_contribution + 1;
    }

    public function createNewPartnership(){
        $p = new MatchInningPartnership();
        $p->batsman1_id = $this->onstrike_batsman->id;
        $p->batsman2_id = $this->nonstrike_batsman->id;
        $p->save();
        $this->partnership = $p;
        return $p;
    }
}