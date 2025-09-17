<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsArticleRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsArticleBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsArticleRepository
    {
        return GoodsArticleRepository::getInstance();
    }
}
