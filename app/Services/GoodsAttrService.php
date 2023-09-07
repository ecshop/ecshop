<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsAttrRepository;
use App\Services\CommonService;
use App\Services\Input\GoodsAttrInput;
use App\Services\Output\GoodsAttrOutput;

class GoodsAttrService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsAttrRepository
    {
        return GoodsAttrRepository::getInstance();
    }
}
