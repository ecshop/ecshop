<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\CommentRepository;
use App\Services\CommonService;
use App\Services\Input\CommentInput;
use App\Services\Output\CommentOutput;

class CommentService extends CommonService implements ServiceInterface
{
    public function getRepository(): CommentRepository
    {
        return CommentRepository::getInstance();
    }
}
