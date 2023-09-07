<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\SearchengineRepository;
use App\Services\CommonService;
use App\Services\Input\SearchengineInput;
use App\Services\Output\SearchengineOutput;

class SearchengineService extends CommonService implements ServiceInterface
{
    public function getRepository(): SearchengineRepository
    {
        return SearchengineRepository::getInstance();
    }
}
