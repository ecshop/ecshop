<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsCatRecommendRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsCatRecommendBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsCatRecommendRepository
    {
        return GoodsCatRecommendRepository::getInstance();
    }
}
