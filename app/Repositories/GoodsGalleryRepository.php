<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodsGalleryEntity;
use App\Models\GoodsGallery;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodsGalleryRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsGalleryRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsGalleryRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsGalleryRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodsGalleryEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodsGalleryEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsGalleryEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodsGalleryEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsGalleryEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsGallery
    {
        return new GoodsGallery();
    }
}
