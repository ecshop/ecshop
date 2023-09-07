<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ErrorLogRepository;
use App\Services\CommonService;
use App\Services\Input\ErrorLogInput;
use App\Services\Output\ErrorLogOutput;

class ErrorLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): ErrorLogRepository
    {
        return ErrorLogRepository::getInstance();
    }
}
