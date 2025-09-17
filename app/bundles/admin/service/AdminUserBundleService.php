<?php

declare(strict_types=1);

namespace app\bundles\admin\service;

use app\bundles\admin\repository\AdminUserRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdminUserBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminUserRepository
    {
        return AdminUserRepository::getInstance();
    }
}
