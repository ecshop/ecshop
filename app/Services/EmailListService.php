<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\EmailListRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class EmailListService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailListRepository
    {
        return EmailListRepository::getInstance();
    }
}
