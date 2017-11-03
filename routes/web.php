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

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');



/**
 * Routing groups
 */

Route::group(array('middleware' => array('web')), function()
{
    Route::get(     '',                                         array('as' => 'index',                                      'uses' => 'HomeController@index'));
});


Route::group(array('middleware' => array('web', 'guest')), function()
{
    // ...
});


Route::group(array('middleware' => array('web', 'auth')), function()
{
    // ...
});


Route::group(array('middleware' => array('web'), 'prefix' => 'admin'), function()
{
    // ...
});


Route::group(array('middleware' => array('web'), 'prefix' => 'ajax'), function()
{
    // ...
});

