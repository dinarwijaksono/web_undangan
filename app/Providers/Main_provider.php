<?php

namespace App\Providers;

use App\Services\User_service;
use Illuminate\Support\ServiceProvider;

class Main_provider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(User_service::class, function () {
            return new User_service;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
