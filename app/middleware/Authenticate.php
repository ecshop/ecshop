<?php

declare(strict_types=1);

namespace app\middleware;

use app\constant\AuthConst;
use Closure;
use think\Request;
use think\Response;

class Authenticate
{
    /**
     * 处理请求
     */
    public function handle(Request $request, Closure $next, string $guard = AuthConst::User): Response
    {
        if (! session('?'.$guard)) {
            if ($request->isAjax()) {
                return json([
                    'code' => 401,
                    'message' => 'Unauthorized',
                    'data' => null,
                ]);
            } else {
                $to = sprintf('/%s/login?callback=%s', AuthConst::getModule($guard), urlencode($request->url(true)));

                return redirect($to);
            }
        }

        return $next($request);
    }
}
