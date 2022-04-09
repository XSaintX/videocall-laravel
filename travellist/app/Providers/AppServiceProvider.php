<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addAction(\App\Actions\link::class);
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
