<?php


/**
 * Routing patterns
 */

Route::pattern('id', '[0-9]+');



/**
 * Routing groups
 */

Route::group(array('before' => ''), function()
{
    Route::get(     '',                                         array('as' => 'index',                                      'uses' => 'HomeController@index'));
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
