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
    Route::get(     '',                                         array('as' => 'index',                                              'uses' => 'HomeController@index'));

    Route::get(     'reset-password',                           array('as' => 'resetPassword',                                      'uses' => 'Auth\PasswordController@showResetPassword'));
    Route::post(    'reset-password',                           array('as' => 'resetPassword.process',                              'uses' => 'Auth\PasswordController@processResetPassword'));
});


Route::group(array('middleware' => array('web', 'guest')), function()
{
    Route::get(     'register',                                 array('as' => 'register',                                           'uses' => 'Auth\AuthController@showRegister'));
    Route::post(    'register',                                 array('as' => 'register.process',                                   'uses' => 'Auth\AuthController@processRegister'));

    Route::get(     'login',                                    array('as' => 'login',                                              'uses' => 'Auth\AuthController@showLogin'));
    Route::post(    'login',                                    array('as' => 'login.process',                                      'uses' => 'Auth\AuthController@processLogin'));
});


Route::group(array('middleware' => array('web', 'auth', 'active')), function()
{
    Route::get(     'profile',                                  array('as' => 'profile.show',                                       'uses' => 'ProfileController@show'));
    Route::get(     'profile/edit',                             array('as' => 'profile.edit',                                       'uses' => 'ProfileController@edit'));
    Route::post(    'profile',                                  array('as' => 'profile.update',                                     'uses' => 'ProfileController@update'));

    Route::get(     'change-email',                             array('as' => 'changeEmail',                                        'uses' => 'Auth\AuthController@showChangeEmail'));
    Route::post(    'change-email',                             array('as' => 'changeEmail.process',                                'uses' => 'Auth\AuthController@processChangeEmail'));

    Route::get(     'change-password',                          array('as' => 'changePassword',                                     'uses' => 'Auth\PasswordController@showChangePassword'));
    Route::post(    'change-password',                          array('as' => 'changePassword.process',                             'uses' => 'Auth\PasswordController@processChangePassword'));

    Route::get(     'logout',                                   array('as' => 'logout',                                             'uses' => 'Auth\AuthController@logout'));
});


Route::group(array('middleware' => array('web'), 'prefix' => 'ajax'), function()
{
    // ...
});

