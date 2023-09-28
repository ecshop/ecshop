<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\LinkGoodEntity;
use App\Models\LinkGood;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class LinkGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?LinkGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): LinkGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new LinkGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(LinkGoodEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?LinkGoodEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new LinkGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?LinkGoodEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new LinkGoodEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): LinkGood
    {
        return new LinkGood();
    }
}
