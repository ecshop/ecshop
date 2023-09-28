<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AdminAction;
use App\Models\Entity\AdminActionEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AdminActionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdminActionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdminActionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdminActionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AdminActionEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdminActionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AdminActionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdminActionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AdminActionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdminAction
    {
        return new AdminAction();
    }
}
