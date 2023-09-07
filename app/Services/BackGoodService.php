<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BackGoodRepository;
use App\Services\CommonService;
use App\Services\Input\BackGoodInput;
use App\Services\Output\BackGoodOutput;

class BackGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackGoodRepository
    {
        return BackGoodRepository::getInstance();
    }
}
