<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\FriendLinkRepository;
use App\Services\CommonService;
use App\Services\Input\FriendLinkInput;
use App\Services\Output\FriendLinkOutput;

class FriendLinkService extends CommonService implements ServiceInterface
{
    public function getRepository(): FriendLinkRepository
    {
        return FriendLinkRepository::getInstance();
    }
}
