<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\FavourableActivityRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class FavourableActivityBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): FavourableActivityRepository
    {
        return FavourableActivityRepository::getInstance();
    }
}
