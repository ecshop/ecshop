<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\VirtualCardRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class VirtualCardBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): VirtualCardRepository
    {
        return VirtualCardRepository::getInstance();
    }
}
