<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CronRepository;

class CronService extends CommonService implements ServiceInterface
{
    public function getRepository(): CronRepository
    {
        return CronRepository::getInstance();
    }
}
