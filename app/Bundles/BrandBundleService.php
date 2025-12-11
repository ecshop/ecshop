<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\BrandRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class BrandBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): BrandRepository
    {
        return BrandRepository::getInstance();
    }
}
