<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\RegFieldsRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class RegFieldsBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegFieldsRepository
    {
        return RegFieldsRepository::getInstance();
    }
}
