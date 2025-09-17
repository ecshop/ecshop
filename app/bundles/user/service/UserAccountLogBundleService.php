<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserAccountLogRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserAccountLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAccountLogRepository
    {
        return UserAccountLogRepository::getInstance();
    }
}
