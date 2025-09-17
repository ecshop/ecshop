<?php

declare(strict_types=1);

namespace app\bundles\ad\service;

use app\bundles\ad\repository\AdCustomRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class AdCustomBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdCustomRepository
    {
        return AdCustomRepository::getInstance();
    }
}
