<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\TemplateRepository;
use App\Services\CommonService;
use App\Services\Input\TemplateInput;
use App\Services\Output\TemplateOutput;

class TemplateService extends CommonService implements ServiceInterface
{
    public function getRepository(): TemplateRepository
    {
        return TemplateRepository::getInstance();
    }
}
