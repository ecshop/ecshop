<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\GoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class GoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodRepository
    {
        return GoodRepository::getInstance();
    }
}
