<?php

declare(strict_types=1);

namespace app\bundles\goods\service;

use app\bundles\goods\repository\GoodsVirtualCardRepository;
use Juling\Foundation\Contract\ServiceInterface;
use Juling\Foundation\Service\CommonService;

class GoodsVirtualCardBundleService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsVirtualCardRepository
    {
        return GoodsVirtualCardRepository::getInstance();
    }
}
