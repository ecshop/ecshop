<?php

declare(strict_types=1);

namespace app\bundles\user\service;

use app\bundles\user\repository\UserFeedbackRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class UserFeedbackBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserFeedbackRepository
    {
        return UserFeedbackRepository::getInstance();
    }
}
