<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\WholesaleRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class WholesaleBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): WholesaleRepository
    {
        return WholesaleRepository::getInstance();
    }
}
