<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if( $this->app->environment('local') ) {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
            $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
            $this->app->register('Ixudra\Generators\GeneratorsServiceProvider');

            $this->app->booting(function() {
                $loader = AliasLoader::getInstance();
                $loader->alias('Debugbar', 'Barryvdh\Debugbar\Facade');
            });
        }
    }

}
