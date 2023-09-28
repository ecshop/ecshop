<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\FriendLinkRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class FriendLinkService extends CommonService implements ServiceInterface
{
    public function getRepository(): FriendLinkRepository
    {
        return FriendLinkRepository::getInstance();
    }
}
