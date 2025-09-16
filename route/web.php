<?php

declare(strict_types=1);

use think\facade\Route;
use think\middleware\SessionInit;

Route::group(function () {
    $routes = glob(app_path().'modules/*/route/route.php');
    foreach ($routes as $route) {
        require $route;
    }
    Route::group(route_rules());
})->middleware(SessionInit::class);
