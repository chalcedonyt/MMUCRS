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
    Route::post('signin', 'Auth\AuthController@authenticate');

    Route::resource('club', 'ClubController');
    Route::resource('activity', 'ActivityController');
    Route::resource('user', 'UserController');

    Route::group(['middleware' => 'auth.api'], function(){
        Route::post('club/member','ClubController@storeMember');
        Route::post('club/admin','ClubController@storeAdmin');
        Route::delete('club/member','ClubController@destroyMember');
        Route::delete('club/admin','ClubController@destroyAdmin');
    });
});
