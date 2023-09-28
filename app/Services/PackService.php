<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PackRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class PackService extends CommonService implements ServiceInterface
{
    public function getRepository(): PackRepository
    {
        return PackRepository::getInstance();
    }
}
