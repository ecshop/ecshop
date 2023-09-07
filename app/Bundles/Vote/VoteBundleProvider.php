<?php

declare(strict_types=1);

namespace App\Bundles\Vote;

use Illuminate\Support\ServiceProvider;

class VoteBundleProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }
}
