<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\OrderInfoEntity;
use App\Models\OrderInfo;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class OrderInfoRepository extends CurdRepository implements RepositoryInterface
{
    private static ?OrderInfoRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): OrderInfoRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new OrderInfoRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(OrderInfoEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?OrderInfoEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new OrderInfoEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?OrderInfoEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new OrderInfoEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): OrderInfo
    {
        return new OrderInfo();
    }
}
