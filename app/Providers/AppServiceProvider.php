<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modman\Parser;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Modman\Parser', function ($app) {
            return new Parser('barbieri_management');
        });
    }
}
