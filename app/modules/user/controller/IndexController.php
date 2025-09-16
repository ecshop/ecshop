<?php

declare(strict_types=1);

namespace app\modules\user\controller;

use OpenApi\Attributes as OA;
use think\response\View;

class IndexController extends BaseController
{
    #[OA\Post(path: '/', summary: '会员首页', security: [['bearerAuth' => []]], tags: ['会员模块'])]
    public function index(): View
    {
        return view('/index');
    }
}
