<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\ExchangeGoodsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class ExchangeGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ExchangeGoodsRepository
    {
        return ExchangeGoodsRepository::getInstance();
    }
}
