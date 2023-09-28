<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Ad;
use App\Models\Entity\AdEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AdRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AdEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AdEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AdEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Ad
    {
        return new Ad();
    }
}
