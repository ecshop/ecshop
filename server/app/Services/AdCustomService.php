<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdCustomRepository;

class AdCustomService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdCustomRepository
    {
        return AdCustomRepository::getInstance();
    }
}
