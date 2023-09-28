<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsGalleryRepository;

class GoodsGalleryService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsGalleryRepository
    {
        return GoodsGalleryRepository::getInstance();
    }
}
