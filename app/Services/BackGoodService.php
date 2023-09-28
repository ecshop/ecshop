<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\BackGoodRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class BackGoodService extends CommonService implements ServiceInterface
{
    public function getRepository(): BackGoodRepository
    {
        return BackGoodRepository::getInstance();
    }
}
