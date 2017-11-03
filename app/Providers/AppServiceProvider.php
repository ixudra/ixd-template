<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Barryvdh\Debugbar\Facade as DebugBarFacade;
use Barryvdh\Debugbar\ServiceProvider as DebugBarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Ixudra\Generators\GeneratorsServiceProvider;
use App\Services\Validation\AppValidator;

use Config;
use Form;
use HTML;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Validator
         */

        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new AppValidator( $translator, $data, $rules, $messages );
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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if( Config::get('app.env') === 'local' ) {
            $this->app->register( DebugBarServiceProvider::class );
            $this->app->register( IdeHelperServiceProvider::class );
            $this->app->register( GeneratorsServiceProvider::class );

            $this->app->booting(function() {
                $loader = AliasLoader::getInstance();
                $loader->alias('Debugbar', DebugBarFacade::class );
            });
        }
    }
}
