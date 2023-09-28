<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Cron;
use App\Models\Entity\CronEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class CronRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CronRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CronRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CronRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(CronEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CronEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new CronEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CronEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new CronEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Cron
    {
        return new Cron();
    }
}
