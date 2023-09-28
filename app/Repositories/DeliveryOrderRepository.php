<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DeliveryOrder;
use App\Models\Entity\DeliveryOrderEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class DeliveryOrderRepository extends CurdRepository implements RepositoryInterface
{
    private static ?DeliveryOrderRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): DeliveryOrderRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new DeliveryOrderRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(DeliveryOrderEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?DeliveryOrderEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new DeliveryOrderEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?DeliveryOrderEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new DeliveryOrderEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): DeliveryOrder
    {
        return new DeliveryOrder();
    }
}
