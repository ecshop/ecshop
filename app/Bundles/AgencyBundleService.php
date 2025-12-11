<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\AgencyRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AgencyBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AgencyRepository
    {
        return AgencyRepository::getInstance();
    }
}
