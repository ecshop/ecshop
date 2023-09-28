<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ErrorLogRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class ErrorLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): ErrorLogRepository
    {
        return ErrorLogRepository::getInstance();
    }
}
