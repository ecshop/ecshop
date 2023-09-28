<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GroupGoodRepository;

class GroupGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): GroupGoodRepository
    {
        return GroupGoodRepository::getInstance();
    }
}
