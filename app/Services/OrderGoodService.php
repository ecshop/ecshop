<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\OrderGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class OrderGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderGoodRepository
    {
        return OrderGoodRepository::getInstance();
    }
}
