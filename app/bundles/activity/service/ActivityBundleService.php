<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityRepository
    {
        return ActivityRepository::getInstance();
    }
}
