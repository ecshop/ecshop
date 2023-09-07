<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ShippingAreaRepository;
use App\Services\CommonService;
use App\Services\Input\ShippingAreaInput;
use App\Services\Output\ShippingAreaOutput;

class ShippingAreaService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingAreaRepository
    {
        return ShippingAreaRepository::getInstance();
    }
}
