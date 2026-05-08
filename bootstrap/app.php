<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo(function (Request $request) {
            // 根据路径判断（推荐，简单可靠）
            if ($request->is('admin*') || $request->is('admin/*')) {
                return route('admin.login');
            }
            return route('login', ['redirect' => request()->fullUrl()]);
        });
		$middleware->use([
            Juling\Foundation\Http\Middleware\Trace::class,
        ]);
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

            // 验证异常
            $exceptions->renderable(function (ValidationException $e) {
                return response()->json([
                    'code' => $e->status,
                    'message' => $e->errors(),
                    'data' => null,
                ]);
            });

            // 自定义异常
            $exceptions->renderable(function (CustomException $e) {
                return response()->json([
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'data' => null,
                ]);
            });

            // NOTFOUND 异常
            $exceptions->renderable(function (NotFoundHttpException $e) {
                return response()->json([
                    'code' => Response::HTTP_NOT_FOUND,
                    'message' => $e->getMessage(),
                    'data' => null,
                ]);
            });

            // 统一错误处理
            $exceptions->renderable(function (Throwable $e) {
                return response()->json([
                    'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => null,
                ]);
            });
        }
    })->create();
