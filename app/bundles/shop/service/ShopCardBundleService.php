<?php

declare(strict_types=1);

namespace app\bundles\shop\service;

use app\bundles\shop\repository\ShopCardRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ShopCardBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopCardRepository
    {
        return ShopCardRepository::getInstance();
    }
}
