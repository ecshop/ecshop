<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\MailTemplateRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class MailTemplateService extends CommonService implements ServiceInterface
{
    public function getRepository(): MailTemplateRepository
    {
        return MailTemplateRepository::getInstance();
    }
}
