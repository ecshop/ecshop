<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsBrandRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsBrandBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsBrandRepository
    {
        return GoodsBrandRepository::getInstance();
    }
}
