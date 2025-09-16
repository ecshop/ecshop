<?php

declare(strict_types=1);

namespace app\modules\admin\controller;

use OpenApi\Attributes as OA;
use think\Request;
use think\response\View;

class IndexController extends BaseController
{
    #[OA\Get(path: '/', summary: '管理控制台', security: [['bearerAuth' => []]], tags: ['管理模块'])]
    public function index(Request $request): View
    {
        return view('/index');
    }

    #[OA\Get(path: '/page/[:page]', summary: '管理页面', security: [['bearerAuth' => []]], tags: ['管理模块'])]
    public function page(Request $request): View
    {
        $page = $request->param('page');

        if (empty($page) || $page === '/') {
            $page = '404';
        }

        return view('/'.$page);
    }
}
