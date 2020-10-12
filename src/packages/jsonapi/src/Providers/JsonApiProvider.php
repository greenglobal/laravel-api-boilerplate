<?php

namespace Kun391\JsonApi\Providers;

use Illuminate\Support\ServiceProvider;

class JsonApiProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
        * Optional methods to load your package assets
        */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'users');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'users');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('jsonapi.php'),
        ]);
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'jsonapi');
        // Publishing the views.
        
        // Publishing assets.
     
        // Publishing the translation files.
       
        // Registering package commands.
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
