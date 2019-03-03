<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/match/{id}', 'MatchController@index')->name('match');

Route::get('/standings', 'StandingController@index')->name('standings');



Route::get('/matches/{tournament_id?}', 'RoundController@runSimulation')->name('matches');
Route::get('/run-simulation/{tournament_id?}', 'RoundController@runSimulation')->name('run-simulation');
Route::get('/start-matches/{tournament_id?}', 'RoundController@startMatches')->name('start-matches');
Route::get('/{tournament_id?}', 'RoundController@index')->name('round-info');

