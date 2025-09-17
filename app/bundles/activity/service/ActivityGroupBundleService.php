<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityGroupRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityGroupBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityGroupRepository
    {
        return ActivityGroupRepository::getInstance();
    }
}
