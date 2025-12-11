<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\AutoManageRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AutoManageBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AutoManageRepository
    {
        return AutoManageRepository::getInstance();
    }
}
