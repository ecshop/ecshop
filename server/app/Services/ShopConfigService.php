<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ShopConfigRepository;

class ShopConfigService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopConfigRepository
    {
        return ShopConfigRepository::getInstance();
    }
}
