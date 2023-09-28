<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\OrderInfoRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class OrderInfoService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderInfoRepository
    {
        return OrderInfoRepository::getInstance();
    }
}
