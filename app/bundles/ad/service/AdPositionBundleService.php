<?php

declare(strict_types=1);

namespace app\bundles\ad\service;

use app\bundles\ad\repository\AdPositionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdPositionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdPositionRepository
    {
        return AdPositionRepository::getInstance();
    }
}
