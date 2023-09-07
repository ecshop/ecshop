<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\OrderInfoRepository;
use App\Services\CommonService;
use App\Services\Input\OrderInfoInput;
use App\Services\Output\OrderInfoOutput;

class OrderInfoService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderInfoRepository
    {
        return OrderInfoRepository::getInstance();
    }
}
