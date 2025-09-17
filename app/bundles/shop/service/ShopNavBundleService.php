<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopNavRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopNavBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopNavRepository
    {
        return ShopNavRepository::getInstance();
    }
}
