<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ShippingRepository;
use App\Services\CommonService;
use App\Services\Input\ShippingInput;
use App\Services\Output\ShippingOutput;

class ShippingService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingRepository
    {
        return ShippingRepository::getInstance();
    }
}
