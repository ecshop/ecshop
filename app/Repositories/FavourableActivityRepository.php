<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\FavourableActivityEntity;
use App\Models\FavourableActivity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class FavourableActivityRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FavourableActivityRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): FavourableActivityRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FavourableActivityRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(FavourableActivityEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?FavourableActivityEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new FavourableActivityEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?FavourableActivityEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new FavourableActivityEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): FavourableActivity
    {
        return new FavourableActivity();
    }
}
