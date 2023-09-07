<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\RoleRepository;
use App\Services\CommonService;
use App\Services\Input\RoleInput;
use App\Services\Output\RoleOutput;

class RoleService extends CommonService implements ServiceInterface
{
    public function getRepository(): RoleRepository
    {
        return RoleRepository::getInstance();
    }
}
