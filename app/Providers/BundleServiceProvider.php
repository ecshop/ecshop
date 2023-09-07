<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class BundleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $gateways = glob(base_path('app/Bundles/*/*BundleProvider.php'));

        foreach ($gateways as $provider) {
            preg_match('/(app\/Bundles\/\w+\/\w+BundleProvider)/', $provider, $matches);
            if (isset($matches[1])) {
                $provider = str_replace('/', '\\', $matches[1]);
                $this->app->register(Str::studly($provider));
            }
        }
    }
}
