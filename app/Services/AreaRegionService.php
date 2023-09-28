<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AreaRegionRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class AreaRegionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AreaRegionRepository
    {
        return AreaRegionRepository::getInstance();
    }
}
