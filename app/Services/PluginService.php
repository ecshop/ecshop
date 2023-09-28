<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PluginRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class PluginService extends CommonService implements ServiceInterface
{
    public function getRepository(): PluginRepository
    {
        return PluginRepository::getInstance();
    }
}
