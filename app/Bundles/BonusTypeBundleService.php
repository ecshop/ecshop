<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\BonusTypeRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class BonusTypeBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): BonusTypeRepository
    {
        return BonusTypeRepository::getInstance();
    }
}
