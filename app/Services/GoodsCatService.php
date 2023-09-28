<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsCatRepository;

class GoodsCatService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsCatRepository
    {
        return GoodsCatRepository::getInstance();
    }
}
