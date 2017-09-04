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



/**
 * Validator resolving
 */

Validator::resolver(function($translator, $data, $rules, $messages)
{
    return new App\Services\Validation\AppValidator( $translator, $data, $rules, $messages );
});



/**
 * HTML macros
 */

Form::macro('openFormGroup', function($name = '', $errors = null, $requiredFields = array(), $showErrors = true, $showRequired = true)
{
    $style = '';
    if( $showErrors && !is_null($errors) && $errors->has( $name ) ) {
        $style .=' has-error';
    }

    if( $showRequired && in_array( $name, $requiredFields ) ) {
        $style .=' required';
    }

    return '<div class="form-group '. $style .'">';
});

Form::macro('closeFormGroup', function($name = '', $errors = null, $showErrors = true, $offsetLeft = 3)
{
    $output = '';
    if( $showErrors && !is_null($errors) && $errors->has( $name ) ) {
        $output .= '<div class="col-lg-12">';
        if( $offsetLeft != 0 ) {
            $output .= '<div class="col-lg-3">&nbsp;</div>'
                . '<div class="col-lg-8">';
        }

        $output .= $errors->first($name, '<span class="help-block">:message</span>');

        if( $offsetLeft != 0 ) {
            $output .=  '</div>';
        }

        $output .=  '</div>';
    }

    return $output .'</div>';
});

Form::macro('iconSubmit', function($value, $iconType, $options = array())
{
    $icon = '<i class="glyphicon glyphicon-'. $iconType .'" aria-hidden="true"></i>&nbsp;'. $value;
    $options[ 'type' ] = 'submit';
    $link = $this->button('#', $options);

    return str_replace('#', $icon, $link);
});

HTML::macro('iconRoute', function($route = '', $data, $iconType, $parameters = array(), $attributes = array())
{
    $icon = '<i class="glyphicon glyphicon-'. $iconType .'" aria-hidden="true"></i>&nbsp;';
    $link = HTML::linkRoute($route, '#'. $data, $parameters, $attributes);

    return str_replace('#', $icon, $link);
});
