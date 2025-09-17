<?php

declare(strict_types=1);

namespace app\bundles\admin\service;

use app\bundles\admin\repository\AdminActionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdminActionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminActionRepository
    {
        return AdminActionRepository::getInstance();
    }
}
