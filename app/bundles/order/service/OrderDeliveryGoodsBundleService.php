<?php

declare(strict_types=1);

namespace app\bundles\order\service;

use app\bundles\order\repository\OrderDeliveryGoodsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class OrderDeliveryGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderDeliveryGoodsRepository
    {
        return OrderDeliveryGoodsRepository::getInstance();
    }
}
