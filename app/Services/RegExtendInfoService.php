<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\RegExtendInfoRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class RegExtendInfoService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegExtendInfoRepository
    {
        return RegExtendInfoRepository::getInstance();
    }
}
