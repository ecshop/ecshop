<?php

declare(strict_types=1);

namespace App\Modules\User\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class LoginController extends BaseController
{
    #[OA\Get(path: 'login', summary: '登录接口', tags: ['认证模块'])]
    #[OA\Response(response: 200, description: 'OK')]
    public function showForm(Request $request): Renderable
    {
        return $this->display('login');
    }
}
