<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\UserAccountEntity;
use App\Models\UserAccount;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class UserAccountRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserAccountRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserAccountRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserAccountRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(UserAccountEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?UserAccountEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new UserAccountEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?UserAccountEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new UserAccountEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): UserAccount
    {
        return new UserAccount();
    }
}
