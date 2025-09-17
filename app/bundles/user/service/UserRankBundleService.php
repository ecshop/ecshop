<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserRankRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserRankBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserRankRepository
    {
        return UserRankRepository::getInstance();
    }
}
