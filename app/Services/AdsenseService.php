<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AdsenseRepository;
use App\Services\CommonService;
use App\Services\Input\AdsenseInput;
use App\Services\Output\AdsenseOutput;

class AdsenseService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdsenseRepository
    {
        return AdsenseRepository::getInstance();
    }
}
