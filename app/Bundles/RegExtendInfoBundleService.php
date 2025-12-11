<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\RegExtendInfoRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class RegExtendInfoBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): RegExtendInfoRepository
    {
        return RegExtendInfoRepository::getInstance();
    }
}
