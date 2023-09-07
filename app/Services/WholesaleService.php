<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\WholesaleRepository;
use App\Services\CommonService;
use App\Services\Input\WholesaleInput;
use App\Services\Output\WholesaleOutput;

class WholesaleService extends CommonService implements ServiceInterface
{
    public function getRepository(): WholesaleRepository
    {
        return WholesaleRepository::getInstance();
    }
}
