<?php

declare(strict_types=1);

namespace app\middleware;

use Closure;
use think\Request;
use think\Response;

class Authorization
{
    /**
     * 处理请求
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Authorization

        return $next($request);
    }
}
