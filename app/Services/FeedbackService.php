<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\FeedbackRepository;

class FeedbackService extends CommonService implements ServiceInterface
{
    public function getRepository(): FeedbackRepository
    {
        return FeedbackRepository::getInstance();
    }
}
