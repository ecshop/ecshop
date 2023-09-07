<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\UserRankRepository;
use App\Services\CommonService;
use App\Services\Input\UserRankInput;
use App\Services\Output\UserRankOutput;

class UserRankService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserRankRepository
    {
        return UserRankRepository::getInstance();
    }
}
