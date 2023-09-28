<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodsCatEntity;
use App\Models\GoodsCat;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodsCatRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsCatRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsCatRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsCatRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodsCatEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodsCatEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsCatEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodsCatEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsCatEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsCat
    {
        return new GoodsCat();
    }
}
