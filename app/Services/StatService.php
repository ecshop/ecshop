<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\StatRepository;
use App\Services\CommonService;
use App\Services\Input\StatInput;
use App\Services\Output\StatOutput;

class StatService extends CommonService implements ServiceInterface
{
    public function getRepository(): StatRepository
    {
        return StatRepository::getInstance();
    }
}
