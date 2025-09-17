<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserBonusRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserBonusBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserBonusRepository
    {
        return UserBonusRepository::getInstance();
    }
}
