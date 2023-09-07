<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ArticleCatRepository;
use App\Services\CommonService;
use App\Services\Input\ArticleCatInput;
use App\Services\Output\ArticleCatOutput;

class ArticleCatService extends CommonService implements ServiceInterface
{
    public function getRepository(): ArticleCatRepository
    {
        return ArticleCatRepository::getInstance();
    }
}
