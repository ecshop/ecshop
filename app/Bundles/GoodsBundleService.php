<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\GoodsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class GoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsRepository
    {
        return GoodsRepository::getInstance();
    }
}
