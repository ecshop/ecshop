<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\TopicRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class TopicBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): TopicRepository
    {
        return TopicRepository::getInstance();
    }
}
