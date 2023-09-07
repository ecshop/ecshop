<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\FeedbackRepository;
use App\Services\CommonService;
use App\Services\Input\FeedbackInput;
use App\Services\Output\FeedbackOutput;

class FeedbackService extends CommonService implements ServiceInterface
{
    public function getRepository(): FeedbackRepository
    {
        return FeedbackRepository::getInstance();
    }
}
