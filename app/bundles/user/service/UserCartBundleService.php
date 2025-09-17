<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserCartRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserCartBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserCartRepository
    {
        return UserCartRepository::getInstance();
    }
}
