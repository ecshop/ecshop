<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CatRecommendRepository;

class CatRecommendService extends CommonService implements ServiceInterface
{
    public function getRepository(): CatRecommendRepository
    {
        return CatRecommendRepository::getInstance();
    }
}
