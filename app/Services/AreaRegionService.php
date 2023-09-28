<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AreaRegionRepository;

class AreaRegionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AreaRegionRepository
    {
        return AreaRegionRepository::getInstance();
    }
}
