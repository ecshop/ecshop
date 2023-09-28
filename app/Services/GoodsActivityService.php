<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\GoodsActivityRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class GoodsActivityService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsActivityRepository
    {
        return GoodsActivityRepository::getInstance();
    }
}
