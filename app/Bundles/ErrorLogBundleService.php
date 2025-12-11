<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\ErrorLogRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class ErrorLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ErrorLogRepository
    {
        return ErrorLogRepository::getInstance();
    }
}
