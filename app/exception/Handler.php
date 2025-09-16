<?php

declare(strict_types=1);

namespace app\exception;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\HttpResponseException;
use think\exception\ValidateException;
use think\Request;
use think\Response;
use Throwable;

/**
 * 应用异常处理类
 */
class Handler extends Handle
{
    /**
     * 不需要记录信息（日志）的异常类列表
     *
     * @var array
     */
    protected $ignoreReport = [
        HttpException::class,
        HttpResponseException::class,
        ModelNotFoundException::class,
        DataNotFoundException::class,
        ValidateException::class,
    ];

    /**
     * 记录异常信息（包括日志或者其它方式记录）
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render(Request $request, Throwable $e): Response
    {
        // 添加自定义异常处理机制
        if (str_contains($request->pathinfo(), 'api/') || $request->isAjax()) {
            $code = $e->getCode() ?: SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR;

            return json(['code' => $code, 'message' => $e->getMessage(), 'data' => null], $code);
        }

        // 其他错误交给系统处理
        return parent::render($request, $e);
    }
}
