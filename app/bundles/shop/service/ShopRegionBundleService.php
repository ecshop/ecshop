<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopRegionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopRegionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopRegionRepository
    {
        return ShopRegionRepository::getInstance();
    }
}
