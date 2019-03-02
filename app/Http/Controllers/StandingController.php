<?php
/**
 * Created by PhpStorm.
 * User: salad
 * Date: 02/03/2019
 * Time: 2:45 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Standing;
use Illuminate\Contracts\View\View;

class StandingController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return View
     */
    public function index()
    {
        $standings = Standing::orderBy('points', 'desc')->get();
        return view('standings', compact('standings'));
    }
}