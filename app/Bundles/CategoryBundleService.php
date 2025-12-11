<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\CategoryRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class CategoryBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): CategoryRepository
    {
        return CategoryRepository::getInstance();
    }
}
