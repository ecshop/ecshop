<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsTypeRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsTypeBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsTypeRepository
    {
        return GoodsTypeRepository::getInstance();
    }
}
