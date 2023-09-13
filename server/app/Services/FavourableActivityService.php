<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\FavourableActivityRepository;

class FavourableActivityService extends CommonService implements ServiceInterface
{
    public function getRepository(): FavourableActivityRepository
    {
        return FavourableActivityRepository::getInstance();
    }
}
