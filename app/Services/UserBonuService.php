<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserBonuRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class UserBonuService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserBonuRepository
    {
        return UserBonuRepository::getInstance();
    }
}
