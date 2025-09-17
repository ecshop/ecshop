<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopPluginsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopPluginsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopPluginsRepository
    {
        return ShopPluginsRepository::getInstance();
    }
}
