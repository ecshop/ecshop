<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\TopicRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class TopicService extends CommonService implements ServiceInterface
{
    public function getRepository(): TopicRepository
    {
        return TopicRepository::getInstance();
    }
}
