<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AdPosition;
use App\Models\Entity\AdPositionEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AdPositionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdPositionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdPositionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdPositionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AdPositionEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdPositionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AdPositionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdPositionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AdPositionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdPosition
    {
        return new AdPosition();
    }
}
