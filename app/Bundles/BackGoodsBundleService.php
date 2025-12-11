<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\BackGoodsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class BackGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackGoodsRepository
    {
        return BackGoodsRepository::getInstance();
    }
}
