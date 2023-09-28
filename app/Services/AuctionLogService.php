<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AuctionLogRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class AuctionLogService extends CommonService implements ServiceInterface
{
    public function getRepository(): AuctionLogRepository
    {
        return AuctionLogRepository::getInstance();
    }
}
