<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Attribute;
use App\Models\Entity\AttributeEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AttributeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AttributeRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AttributeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AttributeRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AttributeEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AttributeEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AttributeEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AttributeEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AttributeEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Attribute
    {
        return new Attribute();
    }
}
