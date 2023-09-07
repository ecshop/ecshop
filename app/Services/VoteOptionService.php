<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\VoteOptionRepository;
use App\Services\CommonService;
use App\Services\Input\VoteOptionInput;
use App\Services\Output\VoteOptionOutput;

class VoteOptionService extends CommonService implements ServiceInterface
{
    public function getRepository(): VoteOptionRepository
    {
        return VoteOptionRepository::getInstance();
    }
}
