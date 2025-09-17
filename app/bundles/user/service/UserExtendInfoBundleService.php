<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserExtendInfoRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserExtendInfoBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserExtendInfoRepository
    {
        return UserExtendInfoRepository::getInstance();
    }
}
