<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\SessionRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class SessionService extends CommonService implements ServiceInterface
{
    public function getRepository(): SessionRepository
    {
        return SessionRepository::getInstance();
    }
}
