<?php

declare(strict_types=1);

namespace app\bundles\order\service;

use app\bundles\order\repository\OrderBackOrderRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class OrderBackOrderBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderBackOrderRepository
    {
        return OrderBackOrderRepository::getInstance();
    }
}
