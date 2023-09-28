<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\DeliveryGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class DeliveryGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): DeliveryGoodRepository
    {
        return DeliveryGoodRepository::getInstance();
    }
}
