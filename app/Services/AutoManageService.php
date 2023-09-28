<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AutoManageRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class AutoManageService extends CommonService implements ServiceInterface
{
    public function getRepository(): AutoManageRepository
    {
        return AutoManageRepository::getInstance();
    }
}
