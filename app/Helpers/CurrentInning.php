<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 07/03/2019
 * Time: 4:17 PM
 */

namespace App\Helpers;

use App\MatchInning;
use App\MatchInningBowler;
use App\Player;
use Illuminate\Support\Facades\Config;

class CurrentInning extends CurrentMatch
{
    protected $inning;
    protected $onstrike_batsman;
    protected $nonstrike_batsman;
    protected $current_bowler;
    protected $partnership;
    protected $extras;

    protected function __construct(MatchInning $inning) {
        parent::__construct($inning->match);
        $this->inning = $inning;
        /* Call the CurrentOnstrikeBatsman Constructor to create the onstrike batsman for the inning for the match*/
        $this->onstrike_batsman = new CurrentOnstrikeBatsman($inning->currentOnstrikeBatsman);
        /* Call the CurrentNonstrikeBatsman Constructor to create the nonstrike batsman for the match*/
        $this->nonstrike_batsman = new CurrentNonstrikeBatsman($inning->currentNonstrikeBatsman);
        /* Call the CurrentBowler Constructor to create the ongoing inning for the match*/
        $this->current_bowler = new CurrentBowler($inning->currentBowlingBowler);
        /* Call the CurrentPartnership Constructor to create the ongoing inning for the match*/
        $this->partnership = new CurrentPartnership($inning->currentPartnership);
        /* Call the CurrentExtra Constructor to create the ongoing inning for the match*/
        $this->extras = new CurrentExtra($inning->currentExtraRecord);
    }

    /* All inning logic goes here*/

    public function addInningScore($runs){
        $this->inning->runs++;
        $this->onstrike_batsman->addBatsmanScore($runs);
        $this->current_bowler->addBowlerScore($runs);
        $this->partnership->addPartnershipRunsContribution($runs);
    }

    public function addInningBall(){
        $this->inning->overs = $this->inning->overs + 0.1;
        if($this->checkOverEnd($this->inning->overs)){
            $this->inning->overs = round($this->inning->overs);
        }
        $this->onstrike_batsman->addBatsmanBall();
        $this->current_bowler->addBowlerBall();
        $this->partnership->addPartnershipBallsFaced();
    }

    private function crossing(){
        $this->onstrike_batsman->gotoNonstrikeEnd();
        $this->nonstrike_batsman->gotoOnstrikeEnd();
    }

    private function assignBowler(){
        $bowler_id = $this->nextBowler();
        $has_bowled = false;
        foreach ($this->inning->matchInningBowlers as $inningBowler) {
            $inningBowler->has_bowled_previous_over = 0;
            $inningBowler->save();
            if ($inningBowler->bowler_id == $bowler_id && $inningBowler->id != $this->current_bowler->id) {
                $has_bowled = true;
            }
        }
        $this->current_bowler->is_bowling = 0;
        $this->current_bowler->has_bowled_previous_over = 1;
        $this->current_bowler->save();

        $this->current_bowler = $this->bowler->changeBowler($bowler_id, $has_bowled);

        $this->inning->current_bowling_bowler_id = $this->current_bowler->id;
    }

    private function fallOfWicket(){
        $this->inning->wickets++;
        $this->onstrike_batsman->out();
        $this->onstrike_batsman = new CurrentOnstrikeBatsman($this->onstrike_batsman->createNewBatsman($this->nextBatsman()));
        $this->partnership = new CurrentPartnership($this->partnership->createNewPartnership());
    }

    private function nextBowler()
    {
        $players = Player::where(['team_id' => $this->inning->batting_team_id])->orderBy('batting_order', 'desc')->get();
        if (!empty($players)) {
            foreach ($players as $player) {
                $inning_player = MatchInningBowler::where(['bowler_id' => $player->id])->where(['inning_id' => $this->inning->id])->first();
                if (!empty($inning_player)) {
                    if (round($inning_player->overs) != Config::get('constants.max_over_limit') && !$inning_player->has_bowled_previous_over) {
                        return $player->id;
                    }
                } else {
                    return $player->id;
                }
            }
        }
        return false;
    }

    private function nextBatsman(){
        return Player::where(['team_id' => $this->inning->battingTeam->id])
            ->where(['batting_order' => $this->inning->last_batting_order + 1])
            ->first();
    }

    protected function checkOverEnd($overs)
    {
        $arr = explode(".", round($overs, 1));
        if(!empty($arr[1])){
            if ($arr[1] == Config::get('constants.over_ball_limit')) {
                $this->crossing();
                $this->assignBowler();
                return true;
            }
        }
        return false;
    }
}