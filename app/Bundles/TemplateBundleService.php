<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\TemplateRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class TemplateBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): TemplateRepository
    {
        return TemplateRepository::getInstance();
    }
}
