<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::resource('games', 'GamesController');

    // Authentication routes...
    // Route::get('auth/login', 'Auth\AuthController@getLogin');
    // Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);
    Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
    Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');

    Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home']);
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PagesController@dashboard']);

});
