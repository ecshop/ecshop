<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdPositionRepository;

class AdPositionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdPositionRepository
    {
        return AdPositionRepository::getInstance();
    }
}
