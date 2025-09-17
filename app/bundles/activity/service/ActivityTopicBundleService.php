<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityTopicRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityTopicBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityTopicRepository
    {
        return ActivityTopicRepository::getInstance();
    }
}
