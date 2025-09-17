<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsTypeAttributeRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsTypeAttributeBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsTypeAttributeRepository
    {
        return GoodsTypeAttributeRepository::getInstance();
    }
}
