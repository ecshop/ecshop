<?php

declare(strict_types=1);

use think\facade\Route;
use think\middleware\Throttle;

Route::group('api', function () {
    $routes = glob(app_path().'api/*/route/route.php');
    foreach ($routes as $route) {
        require $route;
    }
})->middleware(Throttle::class);
