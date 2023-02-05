<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
           'App\Services\Interfaces\ListingServiceInterface',
            'App\Services\Implementations\ListingService',
        );
        $this->app->bind(
            'App\Repositories\Interfaces\ListingRepositoryInterface',
             'App\Repositories\Implementations\ListingRepository',
         );
    }
}
