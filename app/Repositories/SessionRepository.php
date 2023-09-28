<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\SessionEntity;
use App\Models\Session;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class SessionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SessionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SessionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SessionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(SessionEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?SessionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new SessionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?SessionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new SessionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Session
    {
        return new Session();
    }
}
