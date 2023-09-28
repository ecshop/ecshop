<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\EmailSendlistRepository;

class EmailSendlistService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailSendlistRepository
    {
        return EmailSendlistRepository::getInstance();
    }
}
