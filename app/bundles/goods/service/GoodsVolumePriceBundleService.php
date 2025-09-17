<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsVolumePriceRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsVolumePriceBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsVolumePriceRepository
    {
        return GoodsVolumePriceRepository::getInstance();
    }
}
