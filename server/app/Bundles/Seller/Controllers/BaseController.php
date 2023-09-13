<?php

declare(strict_types=1);

namespace App\Bundles\Seller\Controllers;

use App\Bundles\Foundation\Controllers\Controller;
use App\Bundles\Shop\Services\ConfigService;
use App\Support\Error;

abstract class BaseController extends Controller
{
    /**
     * Shop Config
     */
    protected array $config;

    /**
     * Global Error
     */
    protected Error $err;

    protected function init(): void
    {
        define('ECS_ADMIN', true);
        define('DATA_DIR', 'images');
        define('IMAGE_DIR', 'data');

        /* 载入系统参数 */
        $this->config = ConfigService::loadConfig();

        /* 创建错误处理对象 */
        $this->err = new Error('message');
    }
}
