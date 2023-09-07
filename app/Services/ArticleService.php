<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ArticleRepository;
use App\Services\CommonService;
use App\Services\Input\ArticleInput;
use App\Services\Output\ArticleOutput;

class ArticleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ArticleRepository
    {
        return ArticleRepository::getInstance();
    }
}
