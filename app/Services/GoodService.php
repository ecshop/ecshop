<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodRepository;

class GoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodRepository
    {
        return GoodRepository::getInstance();
    }
}
