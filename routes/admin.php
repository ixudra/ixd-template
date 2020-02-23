<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Routing groups
 */

Route::group(array('middleware' => array('web', 'auth', 'admin')), function()
{
    Route::get(     'admin',                                    array('as' => 'admin.index',                                        'uses' => 'HomeController@index'));

    // User routes
    Route::get(     'users',                                    array('as' => 'admin.users.index',                                  'uses' => 'UserController@index'));
    Route::post(    'users',                                    array('as' => 'admin.users.index.process',                          'uses' => 'UserController@index'));
    Route::get(     'users/create',                             array('as' => 'admin.users.create',                                 'uses' => 'UserController@create'));
    Route::post(    'users',                                    array('as' => 'admin.users.store',                                  'uses' => 'UserController@store'));
    Route::get(     'users/{id}',                               array('as' => 'admin.users.show',                                   'uses' => 'UserController@show'));
    Route::get(     'users/{id}/edit',                          array('as' => 'admin.users.edit',                                   'uses' => 'UserController@edit'));
    Route::put(     'users/{id}',                               array('as' => 'admin.users.edit.process',                           'uses' => 'UserController@update'));
    Route::delete(  'users/{id}',                               array('as' => 'admin.users.delete',                                 'uses' => 'UserController@destroy'));
    Route::get(     'users/filter',                             array('as' => 'admin.users.filter',                                 'uses' => 'UserController@filter'));
    Route::post(    'users/filter',                             array('as' => 'admin.users.filter.process',                         'uses' => 'UserController@filter'));
    Route::get(     'users/{id}/logInAsUser',                   array('as' => 'admin.users.logInAsUser',                            'uses' => 'UserController@logInAsUser'));

    Route::get(     'roles',                                    array('as' => 'admin.roles.index',                                  'uses' => 'RoleController@index'));
    Route::post(    'roles',                                    array('as' => 'admin.roles.index.process',                          'uses' => 'RoleController@index'));
    Route::get(     'roles/create',                             array('as' => 'admin.roles.create',                                 'uses' => 'RoleController@create'));
    Route::post(    'roles',                                    array('as' => 'admin.roles.store',                                  'uses' => 'RoleController@store'));
    Route::get(     'roles/{id}',                               array('as' => 'admin.roles.show',                                   'uses' => 'RoleController@show'));
    Route::get(     'roles/{id}/edit',                          array('as' => 'admin.roles.edit',                                   'uses' => 'RoleController@edit'));
    Route::put(     'roles/{id}',                               array('as' => 'admin.roles.edit.process',                           'uses' => 'RoleController@update'));
    Route::delete(  'roles/{id}',                               array('as' => 'admin.roles.delete',                                 'uses' => 'RoleController@destroy'));
    Route::get(     'roles/filter',                             array('as' => 'admin.roles.filter',                                 'uses' => 'RoleController@filter'));
    Route::post(    'roles/filter',                             array('as' => 'admin.roles.filter.process',                         'uses' => 'RoleController@filter'));
});
