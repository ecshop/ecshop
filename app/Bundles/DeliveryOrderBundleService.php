<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\DeliveryOrderRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class DeliveryOrderBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): DeliveryOrderRepository
    {
        return DeliveryOrderRepository::getInstance();
    }
}
