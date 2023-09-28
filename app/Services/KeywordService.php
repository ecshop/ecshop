<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\KeywordRepository;
use Focite\Generator\Contracts\ServiceInterface;
use Focite\Generator\Services\CommonService;

class KeywordService extends CommonService implements ServiceInterface
{
    public function getRepository(): KeywordRepository
    {
        return KeywordRepository::getInstance();
    }
}
