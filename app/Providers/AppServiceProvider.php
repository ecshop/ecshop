<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
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
        $this->loadModules();
    }

    private function loadModules(): void
    {
        $modulesPath = app_path('Modules');
        if (!is_dir($modulesPath)) {
            return;
        }

        $moduleDirs = glob($modulesPath . '/*', GLOB_ONLYDIR);
        foreach ($moduleDirs as $moduleDir) {
            $moduleName = basename($moduleDir);
            $providerClass = "\\App\\Modules\\{$moduleName}\\{$moduleName}ModuleProvider";
            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
