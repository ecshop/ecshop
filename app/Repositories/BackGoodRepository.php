<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\BackGood;
use App\Models\Entity\BackGoodEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class BackGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BackGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BackGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BackGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(BackGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BackGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new BackGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BackGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new BackGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BackGood
    {
        return new BackGood();
    }
}
