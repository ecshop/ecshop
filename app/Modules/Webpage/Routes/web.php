<?php

declare(strict_types=1);

use App\Modules\Webpage\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// 首页
Route::get('/', [IndexController::class, 'index'])->name('index');
