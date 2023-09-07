<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsActivityRepository;
use App\Services\CommonService;
use App\Services\Input\GoodsActivityInput;
use App\Services\Output\GoodsActivityOutput;

class GoodsActivityService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsActivityRepository
    {
        return GoodsActivityRepository::getInstance();
    }
}
