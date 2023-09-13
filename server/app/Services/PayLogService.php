<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\PayLogRepository;

class PayLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): PayLogRepository
    {
        return PayLogRepository::getInstance();
    }
}
