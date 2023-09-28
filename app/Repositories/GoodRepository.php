<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodEntity;
use App\Models\Good;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Good
    {
        return new Good();
    }
}
