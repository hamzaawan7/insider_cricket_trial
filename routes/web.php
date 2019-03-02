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




/*Route::get('match/{id}', 'MatchController@index')->name('match');*/
Route::get('/standings', 'StandingController@index')->name('standings');
Route::get('/{tournament_id?}', 'HomeController@index')->name('home');
/*Route::get('standings1', 'StandingController@index')->name('standings1');*/