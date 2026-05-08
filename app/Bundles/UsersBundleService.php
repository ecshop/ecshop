<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\UsersRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class UsersBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): UsersRepository
    {
        return UsersRepository::getInstance();
    }
}
