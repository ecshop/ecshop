<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BookingGoodRepository;
use App\Services\CommonService;
use App\Services\Input\BookingGoodInput;
use App\Services\Output\BookingGoodOutput;

class BookingGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): BookingGoodRepository
    {
        return BookingGoodRepository::getInstance();
    }
}
