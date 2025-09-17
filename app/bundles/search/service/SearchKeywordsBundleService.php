<?php

declare(strict_types=1);

namespace app\bundles\search\service;

use app\bundles\search\repository\SearchKeywordsRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class SearchKeywordsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): SearchKeywordsRepository
    {
        return SearchKeywordsRepository::getInstance();
    }
}
