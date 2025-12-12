<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::redirect('login', 'user.login')->name('login');
$pages = glob(public_path('*/index.html'));
foreach ($pages as $page) {
    $path = basename(dirname($page));
    Route::get($path, function () use ($page) {
        return file_get_contents($page);
    })->withoutMiddleware('web');
}
