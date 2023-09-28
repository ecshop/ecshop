<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BackGoodRepository;

class BackGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackGoodRepository
    {
        return BackGoodRepository::getInstance();
    }
}
