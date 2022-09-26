<?php

namespace App\Providers;

use App\Models\Biaya;
use App\Observers\BiayaObserver;
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
        //
        // Biaya::observe(BiayaObserver::class);
    }
}
