<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Bundles\Repositories\EmailSendlistRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class EmailSendlistBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): EmailSendlistRepository
    {
        return EmailSendlistRepository::getInstance();
    }
}
