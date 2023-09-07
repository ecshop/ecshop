<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SearchengineRepository;

class SearchengineService extends CommonService implements ServiceInterface
{
    public function getRepository(): SearchengineRepository
    {
        return SearchengineRepository::getInstance();
    }
}
