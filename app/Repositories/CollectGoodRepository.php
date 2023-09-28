<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CollectGood;
use App\Models\Entity\CollectGoodEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class CollectGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CollectGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CollectGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CollectGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(CollectGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CollectGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new CollectGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CollectGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new CollectGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): CollectGood
    {
        return new CollectGood();
    }
}
