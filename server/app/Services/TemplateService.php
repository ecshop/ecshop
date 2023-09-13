<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\TemplateRepository;

class TemplateService extends CommonService implements ServiceInterface
{
    public function getRepository(): TemplateRepository
    {
        return TemplateRepository::getInstance();
    }
}
