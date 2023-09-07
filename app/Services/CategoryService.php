<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CategoryRepository;
use App\Services\CommonService;
use App\Services\Input\CategoryInput;
use App\Services\Output\CategoryOutput;

class CategoryService extends CommonService implements ServiceInterface
{
    public function getRepository(): CategoryRepository
    {
        return CategoryRepository::getInstance();
    }
}
