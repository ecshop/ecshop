<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminUserRepository;
use App\Services\CommonService;
use App\Services\Input\AdminUserInput;
use App\Services\Output\AdminUserOutput;

class AdminUserService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminUserRepository
    {
        return AdminUserRepository::getInstance();
    }
}
