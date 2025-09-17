<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopConfigRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopConfigBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopConfigRepository
    {
        return ShopConfigRepository::getInstance();
    }
}
