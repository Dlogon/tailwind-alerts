<?php

namespace Dlogon\TailwindAlerts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TailwindAlertsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('tailwindalerts', function($app) {
            return new TailwindAlerts();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/tailwind-alerts.php', 'tailwind-alerts');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tailwindalerts');

        Blade::directive('tailwind_alerts', function ()
        {
            return \view("tailwindalerts::components/tailwind-alert");
        });

        if ($this->app->runningInConsole())
        {

            $this->publishes([
              __DIR__.'/../config/tailwind-alerts.php' => config_path('tailwind-alerts.php'),
            ], 'config');

        }
    }
}
