<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\TagRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class TagService extends CommonService implements ServiceInterface
{
    public function getRepository(): TagRepository
    {
        return TagRepository::getInstance();
    }
}
