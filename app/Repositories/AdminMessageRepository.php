<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AdminMessage;
use App\Models\Entity\AdminMessageEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AdminMessageRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdminMessageRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdminMessageRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdminMessageRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AdminMessageEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdminMessageEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AdminMessageEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdminMessageEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AdminMessageEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdminMessage
    {
        return new AdminMessage();
    }
}
