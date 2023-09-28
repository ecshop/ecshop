<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GroupGoodEntity;
use App\Models\GroupGood;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GroupGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GroupGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GroupGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GroupGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GroupGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GroupGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GroupGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GroupGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GroupGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GroupGood
    {
        return new GroupGood();
    }
}
