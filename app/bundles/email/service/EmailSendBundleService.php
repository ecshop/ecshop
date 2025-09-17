<?php

declare(strict_types=1);

namespace app\bundles\email\service;

use app\bundles\email\repository\EmailSendRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class EmailSendBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailSendRepository
    {
        return EmailSendRepository::getInstance();
    }
}
