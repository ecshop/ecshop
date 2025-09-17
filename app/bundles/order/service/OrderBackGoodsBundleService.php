<?php

declare(strict_types=1);

namespace app\bundles\order\service;

use app\bundles\order\repository\OrderBackGoodsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class OrderBackGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderBackGoodsRepository
    {
        return OrderBackGoodsRepository::getInstance();
    }
}
