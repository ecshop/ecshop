<?php

declare(strict_types=1);

namespace app\middleware;

use app\constant\AuthConst;
use Closure;
use think\Request;
use think\Response;

class RedirectIfAuthenticated
{
    /**
     * 处理请求
     */
    public function handle(Request $request, Closure $next, string $guard = AuthConst::User): Response
    {
        if (session('?'.$guard)) {
            $to = sprintf('/%s', AuthConst::getModule($guard));

            return redirect($to);
        }

        return $next($request);
    }
}
