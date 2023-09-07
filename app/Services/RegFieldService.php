<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\RegFieldRepository;
use App\Services\CommonService;
use App\Services\Input\RegFieldInput;
use App\Services\Output\RegFieldOutput;

class RegFieldService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegFieldRepository
    {
        return RegFieldRepository::getInstance();
    }
}
