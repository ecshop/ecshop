<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdCustomRepository;
use App\Services\CommonService;
use App\Services\Input\AdCustomInput;
use App\Services\Output\AdCustomOutput;

class AdCustomService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdCustomRepository
    {
        return AdCustomRepository::getInstance();
    }
}
