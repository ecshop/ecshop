<?php

declare(strict_types=1);

namespace app\controller;

use think\response\View;

class IndexController extends BaseController
{
    public function index(): View
    {
        return view('/index');
    }
}
