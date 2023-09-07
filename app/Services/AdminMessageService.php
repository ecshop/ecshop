<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdminMessageRepository;
use App\Services\CommonService;
use App\Services\Input\AdminMessageInput;
use App\Services\Output\AdminMessageOutput;

class AdminMessageService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminMessageRepository
    {
        return AdminMessageRepository::getInstance();
    }
}
