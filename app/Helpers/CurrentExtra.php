<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\MatchInningExtra;

class CurrentExtra extends CurrentInning
{
    private $extra;

    protected function __construct(MatchInningExtra $extra) {
        parent::__construct($extra->matchInning);
        $this->extra = $extra;
    }

    /* Partnership stats logic goes here */

    public function addExtraWide(){
        $this->extra->wides++;
        $this->extra->total++;
    }

    public function addExtraLegbye(){
        $this->extra->total++;
    }

    public function addExtraNoball(){
        $this->extra->no_balls++;
        $this->extra->total++;
    }

}