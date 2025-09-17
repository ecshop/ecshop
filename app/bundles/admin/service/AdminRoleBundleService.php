<?php

declare(strict_types=1);

namespace app\bundles\admin\service;

use app\bundles\admin\repository\AdminRoleRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdminRoleBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminRoleRepository
    {
        return AdminRoleRepository::getInstance();
    }
}
