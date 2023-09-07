<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceInterface;
use App\Repositories\GoodsGalleryRepository;
use App\Services\CommonService;
use App\Services\Input\GoodsGalleryInput;
use App\Services\Output\GoodsGalleryOutput;

class GoodsGalleryService extends CommonService implements ServiceInterface
{
    public function getRepository(): GoodsGalleryRepository
    {
        return GoodsGalleryRepository::getInstance();
    }
}
