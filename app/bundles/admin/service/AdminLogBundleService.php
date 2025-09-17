<?php

declare(strict_types=1);

namespace app\bundles\admin\service;

use app\bundles\admin\repository\AdminLogRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdminLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminLogRepository
    {
        return AdminLogRepository::getInstance();
    }
}
