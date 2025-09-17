<?php

declare(strict_types=1);

namespace app\bundles\vote\service;

use app\bundles\vote\repository\VoteOptionRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class VoteOptionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteOptionRepository
    {
        return VoteOptionRepository::getInstance();
    }
}
