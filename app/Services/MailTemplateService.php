<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\MailTemplateRepository;

class MailTemplateService extends CommonService implements ServiceInterface
{
    public function getRepository(): MailTemplateRepository
    {
        return MailTemplateRepository::getInstance();
    }
}
