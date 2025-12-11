<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\AreaRegionRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AreaRegionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AreaRegionRepository
    {
        return AreaRegionRepository::getInstance();
    }
}
