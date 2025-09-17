<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsRepository
    {
        return GoodsRepository::getInstance();
    }
}
