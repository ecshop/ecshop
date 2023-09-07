<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SessionsDatumRepository;
use App\Services\CommonService;
use App\Services\Input\SessionsDatumInput;
use App\Services\Output\SessionsDatumOutput;

class SessionsDatumService extends CommonService implements ServiceInterface
{
    public function getRepository(): SessionsDatumRepository
    {
        return SessionsDatumRepository::getInstance();
    }
}
