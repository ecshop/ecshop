<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\OrderGoodRepository;

class OrderGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderGoodRepository
    {
        return OrderGoodRepository::getInstance();
    }
}
