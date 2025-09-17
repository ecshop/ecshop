<?php

declare(strict_types=1);

namespace app\bundles\ad\service;

use app\bundles\ad\repository\AdRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdRepository
    {
        return AdRepository::getInstance();
    }
}
