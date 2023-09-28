<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\ShopConfigEntity;
use App\Models\ShopConfig;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class ShopConfigRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ShopConfigRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ShopConfigRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ShopConfigRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(ShopConfigEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ShopConfigEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new ShopConfigEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ShopConfigEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new ShopConfigEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ShopConfig
    {
        return new ShopConfig();
    }
}
