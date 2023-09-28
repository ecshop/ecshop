<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodsAttrEntity;
use App\Models\GoodsAttr;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodsAttrRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsAttrRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsAttrRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsAttrRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodsAttrEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodsAttrEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsAttrEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodsAttrEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsAttrEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsAttr
    {
        return new GoodsAttr();
    }
}
