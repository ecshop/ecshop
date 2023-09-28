<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\BonusType;
use App\Models\Entity\BonusTypeEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class BonusTypeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BonusTypeRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BonusTypeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BonusTypeRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(BonusTypeEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BonusTypeEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new BonusTypeEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BonusTypeEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new BonusTypeEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BonusType
    {
        return new BonusType();
    }
}
