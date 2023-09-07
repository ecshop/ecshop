<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\FavourableActivityRepository;
use App\Services\CommonService;
use App\Services\Input\FavourableActivityInput;
use App\Services\Output\FavourableActivityOutput;

class FavourableActivityService extends CommonService implements ServiceInterface
{
    public function getRepository(): FavourableActivityRepository
    {
        return FavourableActivityRepository::getInstance();
    }
}
