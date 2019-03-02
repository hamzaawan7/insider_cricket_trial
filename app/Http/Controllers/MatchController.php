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

class MatchController extends Controller
{
    /**
     * Show the match detail for the given match.
     *
     * @return View
     */
    public function index($id)
    {
        return view('match_details', [
            'match' => Match::where(['id' => $id])->first()
        ]);
    }
}