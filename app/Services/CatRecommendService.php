<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CatRecommendRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class CatRecommendService extends CommonService implements ServiceInterface
{
    public function getRepository(): CatRecommendRepository
    {
        return CatRecommendRepository::getInstance();
    }
}
