<?php

namespace App\Providers;

use App\Repository\PictureProduct_repository;
use App\Repository\WhoSeeDemo_repository;
use App\Services\Asset_service;
use App\Services\Auth_service;
use App\Services\Category_service;
use App\Services\Order_service;
use App\Services\PictureProduct_service;
use App\Services\Product_service;
use App\Services\User_service;
use App\Services\WhoSeeDemo_service;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class Main_provider extends ServiceProvider implements DeferrableProvider
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

        $this->app->singleton(Auth_service::class, function ($app) {
            return new Auth_service($app);
        });

        $this->app->singleton(Category_service::class, function () {
            return new Category_service;
        });

        $this->app->singleton(Product_service::class, function ($app) {
            return new Product_service($app);
        });


        $this->app->singleton(WhoSeeDemo_service::class, function () {
            return new WhoSeeDemo_service;
        });

        $this->app->singleton(Order_service::class, function () {
            return new Order_service;
        });

        $this->app->singleton(PictureProduct_service::class, function ($app) {
            return new PictureProduct_service($app);
        });

        $this->app->singleton(Asset_service::class, function ($app) {
            return new Asset_service($app);
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
