<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\OrderGoodEntity;
use App\Models\OrderGood;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class OrderGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?OrderGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): OrderGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new OrderGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(OrderGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?OrderGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new OrderGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?OrderGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new OrderGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): OrderGood
    {
        return new OrderGood();
    }
}
