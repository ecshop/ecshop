<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsAttrRepository;

class GoodsAttrService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsAttrRepository
    {
        return GoodsAttrRepository::getInstance();
    }
}
