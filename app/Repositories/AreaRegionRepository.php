<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AreaRegion;
use App\Models\Entity\AreaRegionEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AreaRegionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AreaRegionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AreaRegionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AreaRegionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AreaRegionEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AreaRegionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AreaRegionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AreaRegionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AreaRegionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AreaRegion
    {
        return new AreaRegion();
    }
}
