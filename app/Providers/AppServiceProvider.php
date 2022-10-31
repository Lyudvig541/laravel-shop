<?php

namespace App\Providers;

use App\Repositories\Contracts\BasketRepositoryContract;
use App\Repositories\Session\BasketRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        BasketRepositoryContract::class => BasketRepository::class,
    ];


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
        //
    }
}
