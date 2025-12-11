<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\UserAccountRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class UserAccountBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAccountRepository
    {
        return UserAccountRepository::getInstance();
    }
}
