<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsArticleRepository;

class GoodsArticleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsArticleRepository
    {
        return GoodsArticleRepository::getInstance();
    }
}
