<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
    //
});


App::after(function($request, $response)
{
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
    if( Auth::guest() ) {
        return Redirect::guest('login');
    }
});


Route::filter('auth.basic', function()
{
    return Auth::basic();
});


Route::filter('guest', function()
{
    if( Auth::check() ) {
        return Redirect::to('/');
    }
});


Route::filter('csrf', function()
{
    if( Session::token() != Input::get('_token') ) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});