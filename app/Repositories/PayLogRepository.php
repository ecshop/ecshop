<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\PayLogEntity;
use App\Models\PayLog;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class PayLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PayLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PayLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PayLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(PayLogEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PayLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new PayLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PayLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new PayLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): PayLog
    {
        return new PayLog();
    }
}
