<?php

namespace Moravio\DocTemplates;

use Illuminate\Support\ServiceProvider;

class DocTemplatesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'moravio');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'moravio');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
//        if ($this->app->runningInConsole()) {
//            $this->bootForConsole();
//        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__.'/../config/doctemplates.php', 'doctemplates');

        // Register the service the package provides.
//        $this->app->singleton('doctemplates', function ($app) {
//            return new DocTemplates;
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['doctemplates'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
//        $this->publishes([
//            __DIR__.'/../config/doctemplates.php' => config_path('doctemplates.php'),
//        ], 'doctemplates.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/moravio'),
        ], 'doctemplates.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/moravio'),
        ], 'doctemplates.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/moravio'),
        ], 'doctemplates.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
