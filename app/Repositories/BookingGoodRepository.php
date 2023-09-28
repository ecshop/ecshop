<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\BookingGood;
use App\Models\Entity\BookingGoodEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class BookingGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BookingGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BookingGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BookingGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(BookingGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BookingGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new BookingGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BookingGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new BookingGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BookingGood
    {
        return new BookingGood();
    }
}
