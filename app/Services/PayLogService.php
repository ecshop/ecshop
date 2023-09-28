<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PayLogRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class PayLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): PayLogRepository
    {
        return PayLogRepository::getInstance();
    }
}
