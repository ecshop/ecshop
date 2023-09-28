<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AgencyRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class AgencyService extends CommonService implements ServiceInterface
{
    public function getRepository(): AgencyRepository
    {
        return AgencyRepository::getInstance();
    }
}
