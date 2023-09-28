<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\PackageGoodEntity;
use App\Models\PackageGood;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class PackageGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PackageGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PackageGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PackageGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(PackageGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PackageGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new PackageGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PackageGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new PackageGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): PackageGood
    {
        return new PackageGood();
    }
}
