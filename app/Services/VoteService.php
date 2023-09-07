<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\VoteRepository;
use App\Services\CommonService;
use App\Services\Input\VoteInput;
use App\Services\Output\VoteOutput;

class VoteService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteRepository
    {
        return VoteRepository::getInstance();
    }
}
