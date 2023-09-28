<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\PackEntity;
use App\Models\Pack;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class PackRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PackRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PackRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PackRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(PackEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PackEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new PackEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PackEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new PackEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Pack
    {
        return new Pack();
    }
}
