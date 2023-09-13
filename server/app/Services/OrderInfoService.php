<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\OrderInfoRepository;

class OrderInfoService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderInfoRepository
    {
        return OrderInfoRepository::getInstance();
    }
}
