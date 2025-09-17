<?php

declare(strict_types=1);

namespace app\bundles\vote\service;

use app\bundles\vote\repository\VoteLogRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class VoteLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteLogRepository
    {
        return VoteLogRepository::getInstance();
    }
}
