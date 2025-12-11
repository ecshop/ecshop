<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\StatsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class StatsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): StatsRepository
    {
        return StatsRepository::getInstance();
    }
}
