<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\NavRepository;

class NavService extends CommonService implements ServiceInterface
{
    public function getRepository(): NavRepository
    {
        return NavRepository::getInstance();
    }
}
