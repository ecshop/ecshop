<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminUserRepository;

class AdminUserService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminUserRepository
    {
        return AdminUserRepository::getInstance();
    }
}
