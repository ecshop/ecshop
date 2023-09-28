<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ShippingAreaRepository;

class ShippingAreaService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingAreaRepository
    {
        return ShippingAreaRepository::getInstance();
    }
}
