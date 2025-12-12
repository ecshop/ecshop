<?php

declare(strict_types=1);

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        if (request()->is('api/*')) {
            // 认证异常
            $exceptions->renderable(function (AuthenticationException $e) {
                return response()->json([
                    'code' => Response::HTTP_UNAUTHORIZED,
                    'message' => $e->getMessage(),
                    'data' => null,
                ]);
            });
        }
    })->create();
