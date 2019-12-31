<?php

namespace App\Providers;

use App\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(App::class, function ($app) {
            return App::query()->where('app_id', request()->get('app_id'))
                ->where('app_secret', request()->get('app_secret'))
                ->first();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
