<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\VoteEntity;
use App\Models\Vote;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class VoteRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VoteRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VoteRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VoteRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(VoteEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VoteEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new VoteEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VoteEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new VoteEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Vote
    {
        return new Vote();
    }
}
