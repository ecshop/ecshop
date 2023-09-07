<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GroupGoodRepository;
use App\Services\CommonService;
use App\Services\Input\GroupGoodInput;
use App\Services\Output\GroupGoodOutput;

class GroupGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): GroupGoodRepository
    {
        return GroupGoodRepository::getInstance();
    }
}
