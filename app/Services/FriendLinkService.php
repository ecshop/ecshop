<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\FriendLinkRepository;

class FriendLinkService extends CommonService implements ServiceInterface
{
    public function getRepository(): FriendLinkRepository
    {
        return FriendLinkRepository::getInstance();
    }
}
