<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserBookingRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserBookingBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserBookingRepository
    {
        return UserBookingRepository::getInstance();
    }
}
