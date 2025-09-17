<?php

declare(strict_types=1);

namespace app\bundles\order\service;

use app\bundles\order\repository\OrderPayRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class OrderPayBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): OrderPayRepository
    {
        return OrderPayRepository::getInstance();
    }
}
