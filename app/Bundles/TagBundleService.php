<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\TagRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class TagBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): TagRepository
    {
        return TagRepository::getInstance();
    }
}
