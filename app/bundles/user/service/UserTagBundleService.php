<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserTagRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserTagBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserTagRepository
    {
        return UserTagRepository::getInstance();
    }
}
