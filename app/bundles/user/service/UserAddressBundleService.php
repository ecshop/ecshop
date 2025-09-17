<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserAddressRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserAddressBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAddressRepository
    {
        return UserAddressRepository::getInstance();
    }
}
