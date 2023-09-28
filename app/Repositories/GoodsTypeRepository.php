<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodsTypeEntity;
use App\Models\GoodsType;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodsTypeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsTypeRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsTypeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsTypeRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodsTypeEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodsTypeEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsTypeEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodsTypeEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsTypeEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsType
    {
        return new GoodsType();
    }
}
