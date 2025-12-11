<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\RoleRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class RoleBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): RoleRepository
    {
        return RoleRepository::getInstance();
    }
}
