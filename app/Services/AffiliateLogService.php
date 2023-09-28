<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AffiliateLogRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class AffiliateLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AffiliateLogRepository
    {
        return AffiliateLogRepository::getInstance();
    }
}
