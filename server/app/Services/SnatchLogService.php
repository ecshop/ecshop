<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SnatchLogRepository;

class SnatchLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): SnatchLogRepository
    {
        return SnatchLogRepository::getInstance();
    }
}
