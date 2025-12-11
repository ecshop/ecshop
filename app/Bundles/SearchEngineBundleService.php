<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\SearchEngineRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class SearchEngineBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): SearchEngineRepository
    {
        return SearchEngineRepository::getInstance();
    }
}
