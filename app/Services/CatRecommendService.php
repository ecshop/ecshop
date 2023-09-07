<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CatRecommendRepository;
use App\Services\CommonService;
use App\Services\Input\CatRecommendInput;
use App\Services\Output\CatRecommendOutput;

class CatRecommendService extends CommonService implements ServiceInterface
{
    public function getRepository(): CatRecommendRepository
    {
        return CatRecommendRepository::getInstance();
    }
}
