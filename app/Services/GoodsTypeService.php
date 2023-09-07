<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsTypeRepository;
use App\Services\CommonService;
use App\Services\Input\GoodsTypeInput;
use App\Services\Output\GoodsTypeOutput;

class GoodsTypeService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsTypeRepository
    {
        return GoodsTypeRepository::getInstance();
    }
}
