<?php

declare(strict_types=1);

namespace app\bundles\supplier\service;

use app\bundles\supplier\repository\SupplierRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class SupplierBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): SupplierRepository
    {
        return SupplierRepository::getInstance();
    }
}
