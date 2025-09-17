<?php

declare(strict_types=1);

namespace app\bundles\shipping\service;

use app\bundles\shipping\repository\ShippingRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShippingBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingRepository
    {
        return ShippingRepository::getInstance();
    }
}
