<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdRepository;

class AdService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdRepository
    {
        return AdRepository::getInstance();
    }
}
