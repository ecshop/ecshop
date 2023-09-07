<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AgencyRepository;
use App\Services\CommonService;
use App\Services\Input\AgencyInput;
use App\Services\Output\AgencyOutput;

class AgencyService extends CommonService implements ServiceInterface
{
    public function getRepository(): AgencyRepository
    {
        return AgencyRepository::getInstance();
    }
}
