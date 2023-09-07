<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SupplierRepository;

class SupplierService extends CommonService implements ServiceInterface
{
    public function getRepository(): SupplierRepository
    {
        return SupplierRepository::getInstance();
    }
}
