<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\GoodsArticleEntity;
use App\Models\GoodsArticle;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class GoodsArticleRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsArticleRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsArticleRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsArticleRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(GoodsArticleEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?GoodsArticleEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsArticleEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?GoodsArticleEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new GoodsArticleEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsArticle
    {
        return new GoodsArticle();
    }
}
