<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodRepository;
use App\Services\CommonService;
use App\Services\Input\GoodInput;
use App\Services\Output\GoodOutput;

class GoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodRepository
    {
        return GoodRepository::getInstance();
    }
}
