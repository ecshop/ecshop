<?php

declare(strict_types=1);

namespace app\modules\user\controller;

use app\middleware\Authenticate;
use Juling\Foundation\Response\JsonResponse;
use Juling\Foundation\Routing\Controller;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\Contact;
use think\facade\Config;

#[OA\Info(version: '1.0', description: '用户认证平台', title: 'API文档', contact: new Contact('API Develop Team'))]
#[OA\Server(url: '/', description: '开发环境')]
abstract class BaseController extends Controller
{
    use JsonResponse;

    protected array $middleware = [
        Authenticate::class,
    ];

    protected function initialize(): void
    {
        Config::set([
            'view_path' => dirname(__DIR__).'/view/',
        ], 'view');
    }
}
