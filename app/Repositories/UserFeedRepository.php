<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\UserFeedEntity;
use App\Models\UserFeed;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class UserFeedRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserFeedRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserFeedRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserFeedRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(UserFeedEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?UserFeedEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new UserFeedEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?UserFeedEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new UserFeedEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): UserFeed
    {
        return new UserFeed();
    }
}
