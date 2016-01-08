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

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('campaign_id', '[0-9]+');
Route::pattern('form_id', '[0-9]+');


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
Route::get('/preview_form/{campaign_id}/{form_id}/{raw?}', ['as' => 'preview_form', 'uses' => 'FrontendController@preview_form']);
Route::post('/store_form_data', ['as' => 'store_form_data', 'uses' => 'FrontendController@store_form_data']);


/** ------------------------------------------
 *  Redirect Routes
 *  ------------------------------------------
 */
Route::get('/home', function () {
    return redirect('/admin/dashboard');
});


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'api/v1'), function()
{
    //POST Request
    Route::post('campaign/create', array('as' => 'api-create-campaign', 'uses' => 'CampaignController@create'));
    Route::post('form/create', array('as' => 'api-create-form', 'uses' => 'FormController@create'));

    //GET Request
    Route::get('campaign/get', array('as' => 'api-get-campaign', 'uses' => 'CampaignController@index'));
    Route::get('form/get/{campaign_id}', array('as' => 'api-get-form', 'uses' => 'FormController@index'));
});


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function()
{
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    Route::get('build/{campaign_id}', ['as' => 'build', 'uses' => 'AdminController@build']);
    Route::post('build/{campaign_id}', 'AdminController@storeBuild');
    Route::get('report', ['as' => 'report', 'uses' => 'AdminController@report']);
});


/** ------------------------------------------
 *  Authentication Routes
 *  ------------------------------------------
 */

Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
