<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminLogRepository;

class AdminLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminLogRepository
    {
        return AdminLogRepository::getInstance();
    }
}
