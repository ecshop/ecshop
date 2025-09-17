<?php

declare(strict_types=1);

namespace app\bundles\payment\service;

use app\bundles\payment\repository\PaymentRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class PaymentBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): PaymentRepository
    {
        return PaymentRepository::getInstance();
    }
}
