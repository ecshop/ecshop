<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\VolumePriceRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class VolumePriceService extends CommonService implements ServiceInterface
{
    public function getRepository(): VolumePriceRepository
    {
        return VolumePriceRepository::getInstance();
    }
}
