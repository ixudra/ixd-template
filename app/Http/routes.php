<?php


Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);




Route::group(array('prefix' => 'admin'), function()
{
    //...
});



/**
 * Validator resolving
 */

Validator::resolver(function($translator, $data, $rules, $messages)
{
    return new App\Services\Validation\AppValidator( $translator, $data, $rules, $messages );
});
