<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\MailTemplatesRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class MailTemplatesBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): MailTemplatesRepository
    {
        return MailTemplatesRepository::getInstance();
    }
}
