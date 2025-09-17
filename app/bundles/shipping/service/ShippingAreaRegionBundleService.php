<?php

declare(strict_types=1);

namespace app\bundles\shipping\service;

use app\bundles\shipping\repository\ShippingAreaRegionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShippingAreaRegionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingAreaRegionRepository
    {
        return ShippingAreaRegionRepository::getInstance();
    }
}
