<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsProductRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsProductBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsProductRepository
    {
        return GoodsProductRepository::getInstance();
    }
}
