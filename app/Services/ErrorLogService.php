<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ErrorLogRepository;

class ErrorLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): ErrorLogRepository
    {
        return ErrorLogRepository::getInstance();
    }
}
