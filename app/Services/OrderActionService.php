<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\OrderActionRepository;
use App\Services\CommonService;
use App\Services\Input\OrderActionInput;
use App\Services\Output\OrderActionOutput;

class OrderActionService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderActionRepository
    {
        return OrderActionRepository::getInstance();
    }
}
