<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\LinkGoodRepository;

class LinkGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): LinkGoodRepository
    {
        return LinkGoodRepository::getInstance();
    }
}
