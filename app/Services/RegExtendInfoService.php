<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\RegExtendInfoRepository;

class RegExtendInfoService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegExtendInfoRepository
    {
        return RegExtendInfoRepository::getInstance();
    }
}
