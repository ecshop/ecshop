<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// 首页
Route::get('/', [\App\Modules\Webpage\Http\Controllers\IndexController::class, 'index'])->name('index');
