<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\SnatchLogRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class SnatchLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): SnatchLogRepository
    {
        return SnatchLogRepository::getInstance();
    }
}
