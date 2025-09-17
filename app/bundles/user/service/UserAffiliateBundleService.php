<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserAffiliateRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserAffiliateBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAffiliateRepository
    {
        return UserAffiliateRepository::getInstance();
    }
}
