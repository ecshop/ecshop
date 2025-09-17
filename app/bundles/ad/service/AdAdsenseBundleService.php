<?php

declare(strict_types=1);

namespace app\bundles\ad\service;

use app\bundles\ad\repository\AdAdsenseRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdAdsenseBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdAdsenseRepository
    {
        return AdAdsenseRepository::getInstance();
    }
}
