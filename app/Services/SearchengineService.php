<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\SearchengineRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class SearchengineService extends CommonService implements ServiceInterface
{
    public function getRepository(): SearchengineRepository
    {
        return SearchengineRepository::getInstance();
    }
}
