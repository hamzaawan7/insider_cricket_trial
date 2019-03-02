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
use App\Standing;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the matches for the given tournament.
     *
     * @return View
     */
    public function index($tournament_id = 4)
    {
        $matches = Match::where(['tournament_id' => $tournament_id])->get();
        return view('tournament_matches', compact('matches'));
    }
}