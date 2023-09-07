<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\VoteLogRepository;
use App\Services\CommonService;
use App\Services\Input\VoteLogInput;
use App\Services\Output\VoteLogOutput;

class VoteLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteLogRepository
    {
        return VoteLogRepository::getInstance();
    }
}
