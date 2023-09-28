<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CollectGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class CollectGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): CollectGoodRepository
    {
        return CollectGoodRepository::getInstance();
    }
}
