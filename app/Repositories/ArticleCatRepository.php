<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ArticleCat;
use App\Models\Entity\ArticleCatEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class ArticleCatRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ArticleCatRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ArticleCatRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ArticleCatRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(ArticleCatEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ArticleCatEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new ArticleCatEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ArticleCatEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new ArticleCatEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ArticleCat
    {
        return new ArticleCat();
    }
}
