<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', ['\App\Bundles\Seller\Controllers\IndexController::class', 'index']);
});
