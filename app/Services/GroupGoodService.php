<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\GroupGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class GroupGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): GroupGoodRepository
    {
        return GroupGoodRepository::getInstance();
    }
}
