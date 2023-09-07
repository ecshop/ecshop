<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminActionRepository;
use App\Services\CommonService;
use App\Services\Input\AdminActionInput;
use App\Services\Output\AdminActionOutput;

class AdminActionService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminActionRepository
    {
        return AdminActionRepository::getInstance();
    }
}
