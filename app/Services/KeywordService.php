<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\KeywordRepository;
use App\Services\CommonService;
use App\Services\Input\KeywordInput;
use App\Services\Output\KeywordOutput;

class KeywordService extends CommonService implements ServiceInterface
{
    public function getRepository(): KeywordRepository
    {
        return KeywordRepository::getInstance();
    }
}
