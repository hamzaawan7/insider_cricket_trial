<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 02/03/2019
 * Time: 2:45 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Match;
use App\MatchInning;
use App\MatchInningBatsman;
use App\MatchInningBowler;
use App\MatchInningExtra;
use App\MatchInningPartnership;
use App\Standing;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

class RoundController extends Controller
{
    /**
     * Show the matches for the given tournament.
     *
     * @return View
     */
    public function index($tournament_id = 1)
    {
        $matches = Match::where(['tournament_id' => $tournament_id])->get();
        return view('tournament_matches', compact('matches', 'tournament_id'));
    }

    /**
     * Show the start the matches for the given tournament.
     *
     * @return Redirect
     */
    public function startMatches($tournament_id = 1)
    {
        $matches = Match::where(['tournament_id' => $tournament_id])->get();
        foreach ($matches as $match){
            $match->match_status_id = 2;
            if ($match->save()){
                start_innings($match);
            }
        }
        return redirect()->route('round-info', ['tournament_id' => $tournament_id]);
    }

    public function runSimulation($tournament_id = 1)
    {
        $matches = Match::where(['tournament_id' => $tournament_id])->get();
        foreach ($matches as $match){
            if(!$match->currentInning->is_completed){
                simulate($match->currentInning);
            }
        }
        return view('_matches', compact('matches'));
    }
}