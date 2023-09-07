<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\VirtualCardRepository;
use App\Services\CommonService;
use App\Services\Input\VirtualCardInput;
use App\Services\Output\VirtualCardOutput;

class VirtualCardService extends CommonService implements ServiceInterface
{
    public function getRepository(): VirtualCardRepository
    {
        return VirtualCardRepository::getInstance();
    }
}
