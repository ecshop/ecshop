<?php

declare(strict_types=1);

namespace app\bundles\article\service;

use app\bundles\article\repository\ArticleRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ArticleBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ArticleRepository
    {
        return ArticleRepository::getInstance();
    }
}
