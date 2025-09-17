<?php

declare(strict_types=1);

namespace app\bundles\admin\service;

use app\bundles\admin\repository\AdminMessageRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdminMessageBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminMessageRepository
    {
        return AdminMessageRepository::getInstance();
    }
}
