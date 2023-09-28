<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\SessionsDatumRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class SessionsDatumService extends CommonService implements ServiceInterface
{
    public function getRepository(): SessionsDatumRepository
    {
        return SessionsDatumRepository::getInstance();
    }
}
