<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\ExchangeGoodRepository;
use App\Services\CommonService;
use App\Services\Input\ExchangeGoodInput;
use App\Services\Output\ExchangeGoodOutput;

class ExchangeGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): ExchangeGoodRepository
    {
        return ExchangeGoodRepository::getInstance();
    }
}
