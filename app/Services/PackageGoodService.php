<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PackageGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class PackageGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): PackageGoodRepository
    {
        return PackageGoodRepository::getInstance();
    }
}
