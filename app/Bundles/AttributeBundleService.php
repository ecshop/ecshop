<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\AttributeRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class AttributeBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): AttributeRepository
    {
        return AttributeRepository::getInstance();
    }
}
