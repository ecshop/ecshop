<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\UserBonuRepository;
use App\Services\CommonService;
use App\Services\Input\UserBonuInput;
use App\Services\Output\UserBonuOutput;

class UserBonuService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserBonuRepository
    {
        return UserBonuRepository::getInstance();
    }
}
