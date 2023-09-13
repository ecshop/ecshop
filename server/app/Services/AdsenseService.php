<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdsenseRepository;

class AdsenseService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdsenseRepository
    {
        return AdsenseRepository::getInstance();
    }
}
