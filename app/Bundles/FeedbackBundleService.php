<?php

declare(strict_types=1);

namespace App\Bundles;

use App\Repositories\FeedbackRepository;
use Juling\Foundation\Contracts\ServiceInterface;
use Juling\Foundation\Services\CommonService;

class FeedbackBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): FeedbackRepository
    {
        return FeedbackRepository::getInstance();
    }
}
