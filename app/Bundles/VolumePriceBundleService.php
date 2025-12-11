<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\VolumePriceRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class VolumePriceBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): VolumePriceRepository
    {
        return VolumePriceRepository::getInstance();
    }
}
