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
        Blade::directive('tailwind_alerts_css', function ()
        {
            return \view("tailwindalerts::styles");
        });
        Blade::directive('tailwind_alerts_scrips', function ()
        {
            return \view("tailwindalerts::scrips");
        });


        if ($this->app->runningInConsole())
        {

            $this->publishes([
              __DIR__.'/../config/tailwind-alerts.php' => config_path('tailwind-alerts.php'),
            ], 'config');

        }
    }

    private function css()
    {
        return <<<EOT
                /*Toast open/load animation*/
        .alert-toast {
            -webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        /*Toast close animation*/
        .alert-toast input:checked~* {
            -webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @-webkit-keyframes fade-out-right {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
                opacity: 1
            }

            100% {
                -webkit-transform: translateX(50px);
                transform: translateX(50px);
                opacity: 0
            }
        }

        @keyframes fade-out-right {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
                opacity: 1
            }

            100% {
                -webkit-transform: translateX(50px);
                transform: translateX(50px);
                opacity: 0
            }
        }
        EOT;
    }
}
