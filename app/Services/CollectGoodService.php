<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CollectGoodRepository;

class CollectGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): CollectGoodRepository
    {
        return CollectGoodRepository::getInstance();
    }
}
