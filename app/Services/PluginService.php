<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\PluginRepository;
use App\Services\CommonService;
use App\Services\Input\PluginInput;
use App\Services\Output\PluginOutput;

class PluginService extends CommonService implements ServiceInterface
{
    public function getRepository(): PluginRepository
    {
        return PluginRepository::getInstance();
    }
}
