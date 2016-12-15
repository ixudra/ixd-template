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

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Resolve validator
        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new AppValidator( $translator, $data, $rules, $messages );
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
