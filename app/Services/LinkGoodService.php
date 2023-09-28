<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\LinkGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class LinkGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): LinkGoodRepository
    {
        return LinkGoodRepository::getInstance();
    }
}
