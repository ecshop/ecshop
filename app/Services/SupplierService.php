<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SupplierRepository;
use App\Services\CommonService;
use App\Services\Input\SupplierInput;
use App\Services\Output\SupplierOutput;

class SupplierService extends CommonService implements ServiceInterface
{
    public function getRepository(): SupplierRepository
    {
        return SupplierRepository::getInstance();
    }
}
