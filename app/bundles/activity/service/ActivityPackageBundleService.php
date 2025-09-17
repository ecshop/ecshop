<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityPackageRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityPackageBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityPackageRepository
    {
        return ActivityPackageRepository::getInstance();
    }
}
