<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsCategoryRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsCategoryBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsCategoryRepository
    {
        return GoodsCategoryRepository::getInstance();
    }
}
