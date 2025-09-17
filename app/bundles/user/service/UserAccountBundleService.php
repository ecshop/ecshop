<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserAccountRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserAccountBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAccountRepository
    {
        return UserAccountRepository::getInstance();
    }
}
