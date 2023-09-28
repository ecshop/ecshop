<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExchangeGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class ExchangeGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): ExchangeGoodRepository
    {
        return ExchangeGoodRepository::getInstance();
    }
}
