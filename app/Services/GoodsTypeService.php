<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsTypeRepository;

class GoodsTypeService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsTypeRepository
    {
        return GoodsTypeRepository::getInstance();
    }
}
