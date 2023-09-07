<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\UserAddressRepository;
use App\Services\CommonService;
use App\Services\Input\UserAddressInput;
use App\Services\Output\UserAddressOutput;

class UserAddressService extends CommonService implements ServiceInterface
{
    public function getRepository(): UserAddressRepository
    {
        return UserAddressRepository::getInstance();
    }
}
