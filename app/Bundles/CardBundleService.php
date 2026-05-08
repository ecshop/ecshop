<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\CardRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class CardBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): CardRepository
    {
        return CardRepository::getInstance();
    }
}
