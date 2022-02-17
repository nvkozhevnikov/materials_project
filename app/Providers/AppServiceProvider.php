<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Europe/Moscow');
        if (app()->environment('remote')){
            URL::forceScheme('https');
        }

        if (env('FORCE_HTTPS', false)){
            URL::forceScheme('https');
        }
	    \Illuminate\Support\Facades\URL::forceScheme('https');
        $this->app['request']->server->set('HTTPS', 'on');
    }
}
