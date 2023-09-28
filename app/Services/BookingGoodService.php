<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\BookingGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class BookingGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): BookingGoodRepository
    {
        return BookingGoodRepository::getInstance();
    }
}
