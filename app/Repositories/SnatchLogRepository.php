<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\SnatchLogEntity;
use App\Models\SnatchLog;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class SnatchLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SnatchLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SnatchLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SnatchLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(SnatchLogEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?SnatchLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new SnatchLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?SnatchLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new SnatchLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): SnatchLog
    {
        return new SnatchLog();
    }
}
