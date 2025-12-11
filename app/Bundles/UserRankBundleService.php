<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\UserRankRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class UserRankBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserRankRepository
    {
        return UserRankRepository::getInstance();
    }
}
