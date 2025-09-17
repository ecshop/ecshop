<?php

declare(strict_types=1);

namespace app\bundles\order\service;

use app\bundles\order\repository\OrderDeliveryOrderRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class OrderDeliveryOrderBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderDeliveryOrderRepository
    {
        return OrderDeliveryOrderRepository::getInstance();
    }
}
