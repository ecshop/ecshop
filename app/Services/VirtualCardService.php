<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\VirtualCardRepository;

class VirtualCardService extends CommonService implements ServiceInterface
{
    public function getRepository(): VirtualCardRepository
    {
        return VirtualCardRepository::getInstance();
    }
}
