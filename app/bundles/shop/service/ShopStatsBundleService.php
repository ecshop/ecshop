<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopStatsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopStatsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopStatsRepository
    {
        return ShopStatsRepository::getInstance();
    }
}
