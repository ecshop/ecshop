<?php

declare(strict_types=1);

namespace app\bundles\order\service;

use app\bundles\order\repository\OrderGoodsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class OrderGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderGoodsRepository
    {
        return OrderGoodsRepository::getInstance();
    }
}
