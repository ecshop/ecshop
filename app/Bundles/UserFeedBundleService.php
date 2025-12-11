<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\UserFeedRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class UserFeedBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserFeedRepository
    {
        return UserFeedRepository::getInstance();
    }
}
