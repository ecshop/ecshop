<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdRepository;
use App\Services\CommonService;
use App\Services\Input\AdInput;
use App\Services\Output\AdOutput;

class AdService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdRepository
    {
        return AdRepository::getInstance();
    }
}
