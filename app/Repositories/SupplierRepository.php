<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\SupplierEntity;
use App\Models\Supplier;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class SupplierRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SupplierRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SupplierRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SupplierRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(SupplierEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?SupplierEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new SupplierEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?SupplierEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new SupplierEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Supplier
    {
        return new Supplier();
    }
}
