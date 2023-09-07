<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\TopicRepository;
use App\Services\CommonService;
use App\Services\Input\TopicInput;
use App\Services\Output\TopicOutput;

class TopicService extends CommonService implements ServiceInterface
{
    public function getRepository(): TopicRepository
    {
        return TopicRepository::getInstance();
    }
}
