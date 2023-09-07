<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\DeliveryOrderRepository;
use App\Services\CommonService;
use App\Services\Input\DeliveryOrderInput;
use App\Services\Output\DeliveryOrderOutput;

class DeliveryOrderService extends CommonService implements ServiceInterface
{
    public function getRepository(): DeliveryOrderRepository
    {
        return DeliveryOrderRepository::getInstance();
    }
}
