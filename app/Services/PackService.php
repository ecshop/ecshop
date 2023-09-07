<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\PackRepository;

class PackService extends CommonService implements ServiceInterface
{
    public function getRepository(): PackRepository
    {
        return PackRepository::getInstance();
    }
}
