<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\NavRepository;
use App\Services\CommonService;
use App\Services\Input\NavInput;
use App\Services\Output\NavOutput;

class NavService extends CommonService implements ServiceInterface
{
    public function getRepository(): NavRepository
    {
        return NavRepository::getInstance();
    }
}
