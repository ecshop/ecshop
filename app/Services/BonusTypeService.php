<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\BonusTypeRepository;
use App\Services\CommonService;
use App\Services\Input\BonusTypeInput;
use App\Services\Output\BonusTypeOutput;

class BonusTypeService extends CommonService implements ServiceInterface
{
    public function getRepository(): BonusTypeRepository
    {
        return BonusTypeRepository::getInstance();
    }
}
