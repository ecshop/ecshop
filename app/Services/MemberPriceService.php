<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\MemberPriceRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class MemberPriceService extends CommonService implements ServiceInterface
{
    public function getRepository(): MemberPriceRepository
    {
        return MemberPriceRepository::getInstance();
    }
}
