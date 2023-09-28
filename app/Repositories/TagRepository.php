<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\TagEntity;
use App\Models\Tag;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class TagRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TagRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): TagRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TagRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(TagEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?TagEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new TagEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?TagEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new TagEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Tag
    {
        return new Tag();
    }
}
