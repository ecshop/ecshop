<?php

declare(strict_types=1);

namespace app\bundles\comment\service;

use app\bundles\comment\repository\CommentRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class CommentBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): CommentRepository
    {
        return CommentRepository::getInstance();
    }
}
