<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserExtendFieldsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserExtendFieldsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserExtendFieldsRepository
    {
        return UserExtendFieldsRepository::getInstance();
    }
}
