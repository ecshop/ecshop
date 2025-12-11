<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\OrderActionRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class OrderActionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderActionRepository
    {
        return OrderActionRepository::getInstance();
    }
}
