<?php

declare(strict_types=1);

namespace app\bundles\activity\service;

use app\bundles\activity\repository\ActivityAuctionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ActivityAuctionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ActivityAuctionRepository
    {
        return ActivityAuctionRepository::getInstance();
    }
}
