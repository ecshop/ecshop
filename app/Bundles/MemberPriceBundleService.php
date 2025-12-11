<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\MemberPriceRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class MemberPriceBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): MemberPriceRepository
    {
        return MemberPriceRepository::getInstance();
    }
}
