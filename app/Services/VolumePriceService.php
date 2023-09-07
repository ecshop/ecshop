<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\VolumePriceRepository;
use App\Services\CommonService;
use App\Services\Input\VolumePriceInput;
use App\Services\Output\VolumePriceOutput;

class VolumePriceService extends CommonService implements ServiceInterface
{
    public function getRepository(): VolumePriceRepository
    {
        return VolumePriceRepository::getInstance();
    }
}
