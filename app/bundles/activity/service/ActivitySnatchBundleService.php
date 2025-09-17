<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivitySnatchRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivitySnatchBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivitySnatchRepository
    {
        return ActivitySnatchRepository::getInstance();
    }
}
