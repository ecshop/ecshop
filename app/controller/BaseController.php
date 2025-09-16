<?php

declare(strict_types=1);

namespace app\controller;

use Juling\Foundation\Response\JsonResponse;
use Juling\Foundation\Routing\Controller;
use think\facade\Config;

abstract class BaseController extends Controller
{
    use JsonResponse;

    protected function initialize(): void
    {
        $theme = config('app.default_theme', 'default');

        Config::set([
            'view_path' => public_path().sprintf('/themes/%s/', $theme),
            'view_suffix' => 'php',
        ], 'view');
    }
}
