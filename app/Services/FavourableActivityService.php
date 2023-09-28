<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\FavourableActivityRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class FavourableActivityService extends CommonService implements ServiceInterface
{
    public function getRepository(): FavourableActivityRepository
    {
        return FavourableActivityRepository::getInstance();
    }
}
