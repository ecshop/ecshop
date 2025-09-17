<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopPackRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopPackBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopPackRepository
    {
        return ShopPackRepository::getInstance();
    }
}
