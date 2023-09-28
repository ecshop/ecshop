<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\ShippingAreaEntity;
use App\Models\ShippingArea;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class ShippingAreaRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ShippingAreaRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ShippingAreaRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ShippingAreaRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(ShippingAreaEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ShippingAreaEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new ShippingAreaEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ShippingAreaEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new ShippingAreaEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ShippingArea
    {
        return new ShippingArea();
    }
}
