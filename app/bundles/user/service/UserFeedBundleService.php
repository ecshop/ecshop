<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserFeedRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserFeedBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserFeedRepository
    {
        return UserFeedRepository::getInstance();
    }
}
