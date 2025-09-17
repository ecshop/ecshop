<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopErrorLogRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopErrorLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopErrorLogRepository
    {
        return ShopErrorLogRepository::getInstance();
    }
}
