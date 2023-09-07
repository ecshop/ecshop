<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ProductRepository;
use App\Services\CommonService;
use App\Services\Input\ProductInput;
use App\Services\Output\ProductOutput;

class ProductService extends CommonService implements ServiceInterface
{
    public function getRepository(): ProductRepository
    {
        return ProductRepository::getInstance();
    }
}
