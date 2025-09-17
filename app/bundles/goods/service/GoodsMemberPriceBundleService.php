<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsMemberPriceRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsMemberPriceBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsMemberPriceRepository
    {
        return GoodsMemberPriceRepository::getInstance();
    }
}
