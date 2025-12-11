<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\CatRecommendRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class CatRecommendBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): CatRecommendRepository
    {
        return CatRecommendRepository::getInstance();
    }
}
