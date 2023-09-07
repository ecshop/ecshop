<?php

use Illuminate\Support\Facades\Route;

Route::prefix('supplier')->group(function () {
    Route::get('/', ['\App\Bundles\Supplier\Controllers\IndexController::class', 'index']);
});
