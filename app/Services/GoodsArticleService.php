<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsArticleRepository;
use App\Services\CommonService;
use App\Services\Input\GoodsArticleInput;
use App\Services\Output\GoodsArticleOutput;

class GoodsArticleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsArticleRepository
    {
        return GoodsArticleRepository::getInstance();
    }
}
