<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\PaymentRepository;
use App\Services\CommonService;
use App\Services\Input\PaymentInput;
use App\Services\Output\PaymentOutput;

class PaymentService extends CommonService implements ServiceInterface
{
    public function getRepository(): PaymentRepository
    {
        return PaymentRepository::getInstance();
    }
}
