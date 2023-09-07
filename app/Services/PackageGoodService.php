<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\PackageGoodRepository;
use App\Services\CommonService;
use App\Services\Input\PackageGoodInput;
use App\Services\Output\PackageGoodOutput;

class PackageGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): PackageGoodRepository
    {
        return PackageGoodRepository::getInstance();
    }
}
