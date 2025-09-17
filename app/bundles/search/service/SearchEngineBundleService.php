<?php

declare(strict_types=1);

namespace app\bundles\search\service;

use app\bundles\search\repository\SearchEngineRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class SearchEngineBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): SearchEngineRepository
    {
        return SearchEngineRepository::getInstance();
    }
}
