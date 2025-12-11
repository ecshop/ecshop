<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\NavRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class NavBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): NavRepository
    {
        return NavRepository::getInstance();
    }
}
