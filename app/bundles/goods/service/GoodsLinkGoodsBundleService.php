<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsLinkGoodsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsLinkGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsLinkGoodsRepository
    {
        return GoodsLinkGoodsRepository::getInstance();
    }
}
