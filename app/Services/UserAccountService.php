<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\UserAccountRepository;
use App\Services\CommonService;
use App\Services\Input\UserAccountInput;
use App\Services\Output\UserAccountOutput;

class UserAccountService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAccountRepository
    {
        return UserAccountRepository::getInstance();
    }
}
