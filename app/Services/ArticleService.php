<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ArticleRepository;

class ArticleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ArticleRepository
    {
        return ArticleRepository::getInstance();
    }
}
