<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AffiliateLogRepository;

class AffiliateLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AffiliateLogRepository
    {
        return AffiliateLogRepository::getInstance();
    }
}
