<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\TopicEntity;
use App\Models\Topic;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class TopicRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TopicRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): TopicRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TopicRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(TopicEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?TopicEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new TopicEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?TopicEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new TopicEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Topic
    {
        return new Topic();
    }
}
