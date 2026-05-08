<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\VoteRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class VoteBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteRepository
    {
        return VoteRepository::getInstance();
    }
}
