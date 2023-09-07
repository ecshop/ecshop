<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AuctionLogRepository;

class AuctionLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AuctionLogRepository
    {
        return AuctionLogRepository::getInstance();
    }
}
