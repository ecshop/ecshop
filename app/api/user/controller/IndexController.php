<?php

declare(strict_types=1);

namespace app\api\user\controller;

use OpenApi\Attributes as OA;
use think\response\Json;

class IndexController extends BaseController
{
    #[OA\Post(path: '/', summary: '用户首页接口', security: [['bearerAuth' => []]], tags: ['用户模块'])]
    public function index(): Json
    {
        return $this->success('用户首页接口 ok');
    }
}
