<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\UserBonusRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class UserBonusBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserBonusRepository
    {
        return UserBonusRepository::getInstance();
    }
}
