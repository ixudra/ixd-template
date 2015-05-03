<?php


/**
 * Routing patterns
 */

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');



/**
 * Routing groups
 */

Route::group(array(), function()
{
    Route::get(     '',                                         array('as' => 'index',                                      'uses' => 'HomeController@index'));
});


Route::group(array('middleware' => 'guest'), function()
{
    // ...
});


Route::group(array('middleware' => 'auth'), function()
{
    // ...
});


Route::group(array('prefix' => 'ajax'), function()
{
    // ...
});


Route::group(array('prefix' => 'admin'), function()
{
    // ...
});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



/**
 * Validator resolving
 */

Validator::resolver(function($translator, $data, $rules, $messages)
{
    return new App\Services\Validation\AppValidator( $translator, $data, $rules, $messages );
});
