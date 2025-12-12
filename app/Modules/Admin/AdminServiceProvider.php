<?php

declare(strict_types=1);

namespace App\Modules\Admin;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class AdminServiceProvider extends ServiceProvider
{
    const string NS = 'admin';

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/Languages', self::NS);

        if (is_dir(__DIR__ . '/Routes')) {
            foreach (glob(__DIR__ . '/Routes/*.php') as $routeFile) {
                $this->loadRoutesFrom($routeFile);
            }
        }

        if (is_dir(__DIR__ . '/Views')) {
            $this->loadViewsFrom(__DIR__ . '/Views', self::NS);
        }

        Folio::path(__DIR__ . '/Views/pages')->uri('/' . self::NS)->middleware([
            '*' => ['web', 'auth:admin'],
        ]);
    }
}
