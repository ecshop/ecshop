<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopAutoManageRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopAutoManageBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopAutoManageRepository
    {
        return ShopAutoManageRepository::getInstance();
    }
}
