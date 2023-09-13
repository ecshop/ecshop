<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BackOrderRepository;

class BackOrderService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackOrderRepository
    {
        return BackOrderRepository::getInstance();
    }
}
