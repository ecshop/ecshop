<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityExchangeRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityExchangeBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityExchangeRepository
    {
        return ActivityExchangeRepository::getInstance();
    }
}
