<?php

namespace App\Providers;

use App\App;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ClientAppProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(App::class, function ($app) {
            return App::query()->where('app_id', request()->get('app_id'))
                ->where('app_secret', request()->get('app_secret'))
                ->first();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
