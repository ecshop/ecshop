<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodsActivityEntity;
use App\Models\GoodsActivity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodsActivityRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsActivityRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsActivityRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsActivityRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodsActivityEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodsActivityEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsActivityEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodsActivityEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsActivityEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsActivity
    {
        return new GoodsActivity();
    }
}
