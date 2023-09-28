<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\RegFieldEntity;
use App\Models\RegField;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class RegFieldRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegFieldRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): RegFieldRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegFieldRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(RegFieldEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?RegFieldEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new RegFieldEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?RegFieldEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new RegFieldEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): RegField
    {
        return new RegField();
    }
}
