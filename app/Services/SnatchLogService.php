<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SnatchLogRepository;
use App\Services\CommonService;
use App\Services\Input\SnatchLogInput;
use App\Services\Output\SnatchLogOutput;

class SnatchLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): SnatchLogRepository
    {
        return SnatchLogRepository::getInstance();
    }
}
