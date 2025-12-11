<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\GoodsTypeRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class GoodsTypeBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsTypeRepository
    {
        return GoodsTypeRepository::getInstance();
    }
}
