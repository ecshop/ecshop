<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\OrderActionEntity;
use App\Models\OrderAction;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class OrderActionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?OrderActionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): OrderActionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new OrderActionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(OrderActionEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?OrderActionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new OrderActionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?OrderActionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new OrderActionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): OrderAction
    {
        return new OrderAction();
    }
}
