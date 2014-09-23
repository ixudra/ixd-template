<?php


/**
 * Routing groups
 */

Route::group(array('before' => ''), function()
{
    Route::get(     '',                                 array('as' => 'index',                              'uses' => 'HomeController@index'));
});


Route::group(array('before' => 'auth'), function()
{

});


Route::group(array('before' => 'auth', 'prefix' => 'admin'), function()
{
    Route::get(     '',                                 array('as' => 'admin.index',                        'uses' => 'AdminController@index'));
    Route::get(     'reportBug',                        array('as' => 'admin.reportBug.show',               'uses' => 'AdminController@reportBug'));
    Route::post(    'reportBug',                        array('as' => 'admin.reportBug.process',            'uses' => 'AdminController@processReportBug'));
});


Route::group(array('before' => 'guest'), function()
{

});




/**
 * Validator resolving
 */

//Validator::resolver(function($translator, $data, $rules, $messages)
//{
//    return new YourAppNameValidator($translator, $data, $rules, $messages);
//});




/**
 * HTML macros
 */

HTML::macro('imageRoute', function($route = '', $img='img/', $alt = '', $parameters = array(), $attributes = array())
{
    $img = HTML::image($img, $alt);
    $link = HTML::linkRoute($route, '#', $parameters, $attributes);

    return str_replace('#', $img, $link);;
});

HTML::macro('imageLink', function($url = '', $img='img/', $alt = '', $parameters = array(), $attributes = array())
{
    $img = HTML::image($img, $alt);
    $link = HTML::link('http://'.$url, '#', $parameters, $attributes);

    return str_replace('#', $img, $link);
});

HTML::macro('iconRoute', function($route = '', $data, $iconType, $parameters = array(), $attributes = array())
{
    $icon = '<i class="icon-'. $iconType .'"></i>';
    $link = HTML::linkRoute($route, '#'.$data, $parameters, $attributes);

    return str_replace('#', $icon, $link);
});

HTML::macro('divRoute', function($route = '', $div, $parameters = array(), $attributes = array())
{
    $link = HTML::linkRoute($route, '#', $parameters, $attributes);

    return str_replace('#', $div, $link);
});