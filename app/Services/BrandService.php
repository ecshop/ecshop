<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BrandRepository;
use App\Services\CommonService;
use App\Services\Input\BrandInput;
use App\Services\Output\BrandOutput;

class BrandService extends CommonService implements ServiceInterface
{
    public function getRepository(): BrandRepository
    {
        return BrandRepository::getInstance();
    }
}
