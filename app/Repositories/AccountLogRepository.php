<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AccountLog;
use App\Models\Entity\AccountLogEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AccountLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AccountLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AccountLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AccountLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AccountLogEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AccountLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AccountLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AccountLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AccountLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AccountLog
    {
        return new AccountLog();
    }
}
