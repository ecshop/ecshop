<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AffiliateLogRepository;
use App\Services\CommonService;
use App\Services\Input\AffiliateLogInput;
use App\Services\Output\AffiliateLogOutput;

class AffiliateLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AffiliateLogRepository
    {
        return AffiliateLogRepository::getInstance();
    }
}
