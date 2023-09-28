<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CardRepository;

class CardService extends CommonService implements ServiceInterface
{
    public function getRepository(): CardRepository
    {
        return CardRepository::getInstance();
    }
}
