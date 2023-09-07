<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\MemberPriceRepository;
use App\Services\CommonService;
use App\Services\Input\MemberPriceInput;
use App\Services\Output\MemberPriceOutput;

class MemberPriceService extends CommonService implements ServiceInterface
{
    public function getRepository(): MemberPriceRepository
    {
        return MemberPriceRepository::getInstance();
    }
}
