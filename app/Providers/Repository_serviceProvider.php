<?php

namespace App\Providers;

use App\Repository\Asset_repository;
use App\Repository\Product_repository;
use App\Repository\BodyProduct_repository;
use App\Repository\Category_repository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class Repository_serviceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Category_repository::class, function ($app) {
            return new Category_repository($app);
        });

        $this->app->singleton(Product_repository::class, function ($app) {
            return new Product_repository($app);
        });

        $this->app->singleton(BodyProduct_repository::class, function ($app) {
            return new BodyProduct_repository($app);
        });


        $this->app->singleton(Asset_repository::class, function ($app) {
            return new Asset_repository($app);
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
