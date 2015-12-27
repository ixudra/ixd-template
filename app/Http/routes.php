<?php


/**
 * Routing patterns
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


Route::group(array('middleware' => array('web'), 'prefix' => 'ajax'), function()
{
    // ...
});


Route::group(array('middleware' => array('web'), 'prefix' => 'admin'), function()
{
    Route::get(     'logs',                                     array('as' => 'logs',                                       'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index'));
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

    return '<div class="form-group col-lg-12 '. $style .'">';
});

Form::macro('closeFormGroup', function($name = '', $errors = null, $showErrors = true)
{
    $output = '';
    if( $showErrors && !is_null($errors) && $errors->has( $name ) ) {
        $output .=' <div class="col-lg-12">'
            . '<div class="col-lg-3">&nbsp;</div>'
            . '<div class="col-lg-8">'
            . $errors->first($name, '<span class="help-block">:message</span>')
            . '</div>'
            . '</div>';
    }

    return $output .'</div>';
});
