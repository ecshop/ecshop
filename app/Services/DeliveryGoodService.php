<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\DeliveryGoodRepository;
use App\Services\CommonService;
use App\Services\Input\DeliveryGoodInput;
use App\Services\Output\DeliveryGoodOutput;

class DeliveryGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): DeliveryGoodRepository
    {
        return DeliveryGoodRepository::getInstance();
    }
}
