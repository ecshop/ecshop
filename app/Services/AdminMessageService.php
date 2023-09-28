<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminMessageRepository;

class AdminMessageService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminMessageRepository
    {
        return AdminMessageRepository::getInstance();
    }
}
