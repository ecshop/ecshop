<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminActionRepository;

class AdminActionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminActionRepository
    {
        return AdminActionRepository::getInstance();
    }
}
