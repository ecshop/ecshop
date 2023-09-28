<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AutoManageRepository;

class AutoManageService extends CommonService implements ServiceInterface
{
    public function getRepository(): AutoManageRepository
    {
        return AutoManageRepository::getInstance();
    }
}
