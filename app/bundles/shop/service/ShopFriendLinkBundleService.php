<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopFriendLinkRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopFriendLinkBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopFriendLinkRepository
    {
        return ShopFriendLinkRepository::getInstance();
    }
}
