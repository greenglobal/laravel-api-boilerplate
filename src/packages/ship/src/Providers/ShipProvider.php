<?php

namespace GGPHP\Ship\Providers;

use Illuminate\Support\ServiceProvider;

class ShipProvider extends ServiceProvider
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
            __DIR__.'/../../config/config.php' => config_path('ship.php'),
        ]);
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'ship');
        
        // Register routes
        $this->registerRoutes();
        // Publishing the views.
        /*$this->publishes([
        __DIR__.'/../resources/views' => resource_path('views/vendor/users'),
        ], 'views');*/

        // Publishing assets.
        /*$this->publishes([
        __DIR__.'/../resources/assets' => public_path('vendor/users'),
        ], 'assets');*/

        // Publishing the translation files.
        /*$this->publishes([
        __DIR__.'/../resources/lang' => resource_path('lang/vendor/users'),
        ], 'lang');*/

        // Registering package commands.
        // $this->commands([]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        if (!$this->app->isLocal()) {
            if (class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
                $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            }
            
            if (class_exists(Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class)) {
                $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            }
        }
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRouteRegistrarFrom(__DIR__.'/RouteRegistrar.php');
        });
    }

    /**
     * Get the registrar route from file.
     *
     * @return array
     */
    private function loadRouteRegistrarFrom($path)
    {
        if (class_exists($path)) {
            return $path::routes();
        }
    }
}
