<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopAgencyRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopAgencyBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopAgencyRepository
    {
        return ShopAgencyRepository::getInstance();
    }
}
