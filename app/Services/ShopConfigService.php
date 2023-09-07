<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ShopConfigRepository;
use App\Services\CommonService;
use App\Services\Input\ShopConfigInput;
use App\Services\Output\ShopConfigOutput;

class ShopConfigService extends CommonService implements ServiceInterface
{
    public function getRepository(): ShopConfigRepository
    {
        return ShopConfigRepository::getInstance();
    }
}
