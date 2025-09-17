<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityBonusRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityBonusBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityBonusRepository
    {
        return ActivityBonusRepository::getInstance();
    }
}
