<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WebModuleProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadViewsFrom(public_path('themes/default'), 'web');
    }
}
