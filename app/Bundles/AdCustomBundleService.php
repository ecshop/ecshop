<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\AdCustomRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AdCustomBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdCustomRepository
    {
        return AdCustomRepository::getInstance();
    }
}
