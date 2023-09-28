<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\BackOrder;
use App\Models\Entity\BackOrderEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class BackOrderRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BackOrderRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BackOrderRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BackOrderRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(BackOrderEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BackOrderEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new BackOrderEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BackOrderEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new BackOrderEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BackOrder
    {
        return new BackOrder();
    }
}
