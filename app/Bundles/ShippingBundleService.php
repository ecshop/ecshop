<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\ShippingRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class ShippingBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShippingRepository
    {
        return ShippingRepository::getInstance();
    }
}
