<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\GroupGoodsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class GroupGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GroupGoodsRepository
    {
        return GroupGoodsRepository::getInstance();
    }
}
