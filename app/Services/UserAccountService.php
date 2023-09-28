<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserAccountRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class UserAccountService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAccountRepository
    {
        return UserAccountRepository::getInstance();
    }
}
