<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\FriendLinkEntity;
use App\Models\FriendLink;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class FriendLinkRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FriendLinkRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): FriendLinkRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FriendLinkRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(FriendLinkEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?FriendLinkEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new FriendLinkEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?FriendLinkEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new FriendLinkEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): FriendLink
    {
        return new FriendLink();
    }
}
