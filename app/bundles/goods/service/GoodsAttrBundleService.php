<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsAttrRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsAttrBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsAttrRepository
    {
        return GoodsAttrRepository::getInstance();
    }
}
