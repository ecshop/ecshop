<?php

declare(strict_types=1);

namespace app\bundles\article\service;

use app\bundles\article\repository\ArticleCatRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class ArticleCatBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): ArticleCatRepository
    {
        return ArticleCatRepository::getInstance();
    }
}
