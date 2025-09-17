<?php

declare(strict_types=1);

namespace app\bundles\email\service;

use app\bundles\email\repository\EmailSubscriptionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class EmailSubscriptionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailSubscriptionRepository
    {
        return EmailSubscriptionRepository::getInstance();
    }
}
