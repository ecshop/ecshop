<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\CartRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class CartBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): CartRepository
    {
        return CartRepository::getInstance();
    }
}
