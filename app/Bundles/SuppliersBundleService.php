<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\SuppliersRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class SuppliersBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): SuppliersRepository
    {
        return SuppliersRepository::getInstance();
    }
}
