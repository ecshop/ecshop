<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BackOrderRepository;
use App\Services\CommonService;
use App\Services\Input\BackOrderInput;
use App\Services\Output\BackOrderOutput;

class BackOrderService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackOrderRepository
    {
        return BackOrderRepository::getInstance();
    }
}
