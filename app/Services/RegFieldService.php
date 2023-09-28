<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\RegFieldRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class RegFieldService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegFieldRepository
    {
        return RegFieldRepository::getInstance();
    }
}
