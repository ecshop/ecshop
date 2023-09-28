<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\BonusTypeRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class BonusTypeService extends CommonService implements ServiceInterface
{
    public function getRepository(): BonusTypeRepository
    {
        return BonusTypeRepository::getInstance();
    }
}
