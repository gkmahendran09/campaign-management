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

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
//  function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return redirect('/admin/dashboard');
});

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function()
{
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    Route::get('report', ['as' => 'report', 'uses' => 'AdminController@report']);    
});

// Authentication routes...
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
