<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\SnatchLogRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class SnatchLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): SnatchLogRepository
    {
        return SnatchLogRepository::getInstance();
    }
}
