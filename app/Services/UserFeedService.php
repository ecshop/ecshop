<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\UserFeedRepository;
use App\Services\CommonService;
use App\Services\Input\UserFeedInput;
use App\Services\Output\UserFeedOutput;

class UserFeedService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserFeedRepository
    {
        return UserFeedRepository::getInstance();
    }
}
