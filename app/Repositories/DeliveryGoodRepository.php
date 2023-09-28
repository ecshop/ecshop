<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DeliveryGood;
use App\Models\Entity\DeliveryGoodEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class DeliveryGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?DeliveryGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): DeliveryGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new DeliveryGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(DeliveryGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?DeliveryGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new DeliveryGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?DeliveryGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new DeliveryGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): DeliveryGood
    {
        return new DeliveryGood();
    }
}
