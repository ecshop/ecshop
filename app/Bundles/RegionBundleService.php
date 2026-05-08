<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\RegionRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class RegionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegionRepository
    {
        return RegionRepository::getInstance();
    }
}
