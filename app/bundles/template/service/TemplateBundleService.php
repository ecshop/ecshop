<?php

declare(strict_types=1);

namespace app\bundles\template\service;

use app\bundles\template\repository\TemplateRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class TemplateBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): TemplateRepository
    {
        return TemplateRepository::getInstance();
    }
}
