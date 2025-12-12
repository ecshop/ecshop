<?php

declare(strict_types=1);

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // 自定义未认证异常处理
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'code' => Response::HTTP_UNAUTHORIZED,
                    'message' => $e->getMessage(),
                    'data' => null,
                ], 401);
            }

            $guard = Arr::first($e->guards());
            return match ($guard) {
                'admin' => redirect()->guest(route('admin.login')),
                default => redirect()->guest(route('user.login')),
            };
        });

        // 其他自定义：报告、节流等
    })->create();
