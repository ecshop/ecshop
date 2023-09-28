<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\UserBonuEntity;
use App\Models\UserBonu;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class UserBonuRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserBonuRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserBonuRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserBonuRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(UserBonuEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?UserBonuEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new UserBonuEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?UserBonuEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new UserBonuEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): UserBonu
    {
        return new UserBonu();
    }
}
