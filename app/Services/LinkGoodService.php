<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\LinkGoodRepository;
use App\Services\CommonService;
use App\Services\Input\LinkGoodInput;
use App\Services\Output\LinkGoodOutput;

class LinkGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): LinkGoodRepository
    {
        return LinkGoodRepository::getInstance();
    }
}
