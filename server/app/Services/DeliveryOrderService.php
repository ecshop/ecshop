<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\DeliveryOrderRepository;

class DeliveryOrderService extends CommonService implements ServiceInterface
{
    public function getRepository(): DeliveryOrderRepository
    {
        return DeliveryOrderRepository::getInstance();
    }
}
