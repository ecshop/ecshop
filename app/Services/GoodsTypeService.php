<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\GoodsTypeRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class GoodsTypeService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsTypeRepository
    {
        return GoodsTypeRepository::getInstance();
    }
}
