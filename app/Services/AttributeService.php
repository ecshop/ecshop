<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\AttributeRepository;

class AttributeService extends CommonService implements ServiceInterface
{
    public function getRepository(): AttributeRepository
    {
        return AttributeRepository::getInstance();
    }
}
