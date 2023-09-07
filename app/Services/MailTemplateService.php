<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\MailTemplateRepository;
use App\Services\CommonService;
use App\Services\Input\MailTemplateInput;
use App\Services\Output\MailTemplateOutput;

class MailTemplateService extends CommonService implements ServiceInterface
{
    public function getRepository(): MailTemplateRepository
    {
        return MailTemplateRepository::getInstance();
    }
}
