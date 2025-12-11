<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\BookingGoodsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class BookingGoodsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): BookingGoodsRepository
    {
        return BookingGoodsRepository::getInstance();
    }
}
