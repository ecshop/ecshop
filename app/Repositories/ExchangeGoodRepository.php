<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\ExchangeGoodEntity;
use App\Models\ExchangeGood;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class ExchangeGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ExchangeGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ExchangeGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ExchangeGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(ExchangeGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ExchangeGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new ExchangeGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ExchangeGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new ExchangeGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ExchangeGood
    {
        return new ExchangeGood();
    }
}
