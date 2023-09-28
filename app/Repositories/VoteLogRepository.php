<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\VoteLogEntity;
use App\Models\VoteLog;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class VoteLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VoteLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VoteLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VoteLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(VoteLogEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VoteLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new VoteLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VoteLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new VoteLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VoteLog
    {
        return new VoteLog();
    }
}
