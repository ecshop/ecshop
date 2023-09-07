<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\EmailListRepository;

class EmailListService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailListRepository
    {
        return EmailListRepository::getInstance();
    }
}
