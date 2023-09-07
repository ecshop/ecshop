<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AreaRegionRepository;
use App\Services\CommonService;
use App\Services\Input\AreaRegionInput;
use App\Services\Output\AreaRegionOutput;

class AreaRegionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AreaRegionRepository
    {
        return AreaRegionRepository::getInstance();
    }
}
