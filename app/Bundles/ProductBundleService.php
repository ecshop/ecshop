<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\ProductRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class ProductBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ProductRepository
    {
        return ProductRepository::getInstance();
    }
}
