<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsCatRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsCatBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsCatRepository
    {
        return GoodsCatRepository::getInstance();
    }
}
