<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CronRepository;
use App\Services\CommonService;
use App\Services\Input\CronInput;
use App\Services\Output\CronOutput;

class CronService extends CommonService implements ServiceInterface
{
    public function getRepository(): CronRepository
    {
        return CronRepository::getInstance();
    }
}
