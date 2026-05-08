<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\AdminActionRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AdminActionBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AdminActionRepository
    {
        return AdminActionRepository::getInstance();
    }
}
