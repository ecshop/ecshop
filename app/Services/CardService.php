<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CardRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class CardService extends CommonService implements ServiceInterface
{
    public function getRepository(): CardRepository
    {
        return CardRepository::getInstance();
    }
}
