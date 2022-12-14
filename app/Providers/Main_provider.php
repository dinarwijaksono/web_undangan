<?php

namespace App\Providers;

use App\Models\PicturesProduct;
use App\Services\Category_service;
use App\Services\Order_service;
use App\Services\PictureProduct_service;
use App\Services\Product_service;
use App\Services\User_service;
use App\Services\WhoSeeDemo_service;

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

        $this->app->singleton(Category_service::class, function () {
            return new Category_service;
        });

        $this->app->singleton(Product_service::class, function () {
            return new Product_service;
        });


        $this->app->singleton(WhoSeeDemo_service::class, function () {
            return new WhoSeeDemo_service;
        });

        $this->app->singleton(Order_service::class, function () {
            return new Order_service;
        });

        $this->app->singleton(PictureProduct_service::class, function () {
            return new PictureProduct_service;
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
