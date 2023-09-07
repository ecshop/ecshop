<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\TagRepository;
use App\Services\CommonService;
use App\Services\Input\TagInput;
use App\Services\Output\TagOutput;

class TagService extends CommonService implements ServiceInterface
{
    public function getRepository(): TagRepository
    {
        return TagRepository::getInstance();
    }
}
