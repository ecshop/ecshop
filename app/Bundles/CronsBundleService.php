<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\CronsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class CronsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): CronsRepository
    {
        return CronsRepository::getInstance();
    }
}
