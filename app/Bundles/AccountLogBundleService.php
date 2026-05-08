<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\AccountLogRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AccountLogBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AccountLogRepository
    {
        return AccountLogRepository::getInstance();
    }
}
