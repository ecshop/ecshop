<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\TagRepository;

class TagService extends CommonService implements ServiceInterface
{
    public function getRepository(): TagRepository
    {
        return TagRepository::getInstance();
    }
}
