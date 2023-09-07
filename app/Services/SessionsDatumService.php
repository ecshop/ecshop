<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SessionsDatumRepository;

class SessionsDatumService extends CommonService implements ServiceInterface
{
    public function getRepository(): SessionsDatumRepository
    {
        return SessionsDatumRepository::getInstance();
    }
}
