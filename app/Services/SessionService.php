<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SessionRepository;
use App\Services\CommonService;
use App\Services\Input\SessionInput;
use App\Services\Output\SessionOutput;

class SessionService extends CommonService implements ServiceInterface
{
    public function getRepository(): SessionRepository
    {
        return SessionRepository::getInstance();
    }
}
