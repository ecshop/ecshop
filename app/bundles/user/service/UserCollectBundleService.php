<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserCollectRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserCollectBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserCollectRepository
    {
        return UserCollectRepository::getInstance();
    }
}
