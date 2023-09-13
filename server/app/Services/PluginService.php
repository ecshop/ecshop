<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\PluginRepository;

class PluginService extends CommonService implements ServiceInterface
{
    public function getRepository(): PluginRepository
    {
        return PluginRepository::getInstance();
    }
}
