<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdPositionRepository;
use App\Services\CommonService;
use App\Services\Input\AdPositionInput;
use App\Services\Output\AdPositionOutput;

class AdPositionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdPositionRepository
    {
        return AdPositionRepository::getInstance();
    }
}
