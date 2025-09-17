<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopCronRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopCronBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopCronRepository
    {
        return ShopCronRepository::getInstance();
    }
}
