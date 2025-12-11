<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\AffiliateLogRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AffiliateLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AffiliateLogRepository
    {
        return AffiliateLogRepository::getInstance();
    }
}
