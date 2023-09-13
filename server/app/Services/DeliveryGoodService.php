<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\DeliveryGoodRepository;

class DeliveryGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): DeliveryGoodRepository
    {
        return DeliveryGoodRepository::getInstance();
    }
}
