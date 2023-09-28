<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CartRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class CartService extends CommonService implements ServiceInterface
{
    public function getRepository(): CartRepository
    {
        return CartRepository::getInstance();
    }
}
