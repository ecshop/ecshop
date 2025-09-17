<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityWholesaleRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityWholesaleBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityWholesaleRepository
    {
        return ActivityWholesaleRepository::getInstance();
    }
}
