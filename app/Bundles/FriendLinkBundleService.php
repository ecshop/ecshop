<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\FriendLinkRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class FriendLinkBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): FriendLinkRepository
    {
        return FriendLinkRepository::getInstance();
    }
}
