<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminLogRepository;
use App\Services\CommonService;
use App\Services\Input\AdminLogInput;
use App\Services\Output\AdminLogOutput;

class AdminLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminLogRepository
    {
        return AdminLogRepository::getInstance();
    }
}
