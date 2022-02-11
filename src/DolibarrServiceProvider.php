<?php

namespace Pmilinvest\Dolibarr;

use Illuminate\Support\ServiceProvider;
use Pmilinvest\Dolibarr\Console\InstallDolibarrPackage;
use Pmilinvest\Dolibarr\Console\TestDolibarrPackage;

class DolibarrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'dolibarr');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'dolibarr');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/dolibarr.php' => config_path('dolibarr.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/dolibarr'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/dolibarr'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/dolibarr'),
            ], 'lang');*/

            // Registering package commands.
             $this->commands([
                 InstallDolibarrPackage ::class,
                 TestDolibarrPackage ::class,
             ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/dolibarr.php', 'dolibarr');

        // Register the main class to use with the facade
        $this->app->singleton('dolibarr', function () {
            return new Dolibarr;
        });
    }
}
