<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\EmailListRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class EmailListBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailListRepository
    {
        return EmailListRepository::getInstance();
    }
}
