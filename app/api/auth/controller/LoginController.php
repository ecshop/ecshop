<?php

declare(strict_types=1);

namespace app\api\auth\controller;

use OpenApi\Attributes as OA;
use think\response\Json;

class LoginController extends BaseController
{
    #[OA\Post(path: 'login', summary: '用户登录接口', security: [['bearerAuth' => []]], tags: ['认证模块'])]
    public function index(): Json
    {
        return $this->success('ok');
    }
}
