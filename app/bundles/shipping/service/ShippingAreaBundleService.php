<?php

declare(strict_types=1);

namespace app\bundles\shipping\service;

use app\bundles\shipping\repository\ShippingAreaRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShippingAreaBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingAreaRepository
    {
        return ShippingAreaRepository::getInstance();
    }
}
