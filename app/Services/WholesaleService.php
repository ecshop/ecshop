<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\WholesaleRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class WholesaleService extends CommonService implements ServiceInterface
{
    public function getRepository(): WholesaleRepository
    {
        return WholesaleRepository::getInstance();
    }
}
