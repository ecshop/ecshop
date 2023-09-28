<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\UserRankEntity;
use App\Models\UserRank;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class UserRankRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserRankRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserRankRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserRankRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(UserRankEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?UserRankEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new UserRankEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?UserRankEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new UserRankEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): UserRank
    {
        return new UserRank();
    }
}
