<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AccountLogRepository;
use App\Services\CommonService;
use App\Services\Input\AccountLogInput;
use App\Services\Output\AccountLogOutput;

class AccountLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AccountLogRepository
    {
        return AccountLogRepository::getInstance();
    }
}
