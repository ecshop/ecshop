<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\BackOrderRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class BackOrderService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackOrderRepository
    {
        return BackOrderRepository::getInstance();
    }
}
