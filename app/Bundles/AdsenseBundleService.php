<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\AdsenseRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AdsenseBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdsenseRepository
    {
        return AdsenseRepository::getInstance();
    }
}
