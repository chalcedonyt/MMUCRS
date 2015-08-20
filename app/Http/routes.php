<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'v1'], function(){
    Route::get('club',              ['as' => 'club-index', 'uses' => 'ClubController@index']);
    Route::get('club/{id}',         ['as' => 'club-show', 'uses' => 'ClubController@show']);
    Route::get('activity',          ['as' => 'activity-index', 'uses' => 'ActivityController@index']);
    Route::get('activity/{id}',     ['as' => 'activity-show', 'uses' => 'ActivityController@show']);
    Route::get('user',              ['as' => 'user-index', 'uses' => 'UserController@index']);
    Route::get('user/{id}',         ['as' => 'user-show', 'uses' => 'UserController@show']);
});
