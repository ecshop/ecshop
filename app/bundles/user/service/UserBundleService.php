<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserRepository
    {
        return UserRepository::getInstance();
    }
}
