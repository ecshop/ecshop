<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\UserFeedRepository;

class UserFeedService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserFeedRepository
    {
        return UserFeedRepository::getInstance();
    }
}
