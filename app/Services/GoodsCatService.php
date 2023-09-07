<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsCatRepository;
use App\Services\CommonService;
use App\Services\Input\GoodsCatInput;
use App\Services\Output\GoodsCatOutput;

class GoodsCatService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsCatRepository
    {
        return GoodsCatRepository::getInstance();
    }
}
