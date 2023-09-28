<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\SessionsDatumEntity;
use App\Models\SessionsDatum;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class SessionsDatumRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SessionsDatumRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SessionsDatumRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SessionsDatumRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(SessionsDatumEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?SessionsDatumEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new SessionsDatumEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?SessionsDatumEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new SessionsDatumEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): SessionsDatum
    {
        return new SessionsDatum();
    }
}
