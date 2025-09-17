<?php

declare(strict_types=1);

namespace app\bundles\vote\service;

use app\bundles\vote\repository\VoteRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class VoteBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteRepository
    {
        return VoteRepository::getInstance();
    }
}
