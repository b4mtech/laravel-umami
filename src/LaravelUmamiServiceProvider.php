<?php

namespace B4mtech\LaravelUmami;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelUmamiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        Blade::if('showUmami', function () {
            return config('umami.website_id') !== null;
        });
        /*
         * Optional methods to load your package assets
         */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-umami');

        if ($this->app->runningInConsole()) {
            // Publish the config
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('umami.php'),
            ], 'umami-config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views/components' => resource_path('views/components'),
            ], 'umami-view-components');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'umami');
    }
}
