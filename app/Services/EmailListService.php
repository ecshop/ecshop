<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\EmailListRepository;
use App\Services\CommonService;
use App\Services\Input\EmailListInput;
use App\Services\Output\EmailListOutput;

class EmailListService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailListRepository
    {
        return EmailListRepository::getInstance();
    }
}
