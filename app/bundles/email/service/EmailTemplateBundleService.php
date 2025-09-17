<?php

declare(strict_types=1);

namespace app\bundles\email\service;

use app\bundles\email\repository\EmailTemplateRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class EmailTemplateBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailTemplateRepository
    {
        return EmailTemplateRepository::getInstance();
    }
}
