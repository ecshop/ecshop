<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\VoteOptionEntity;
use App\Models\VoteOption;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class VoteOptionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VoteOptionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VoteOptionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VoteOptionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(VoteOptionEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VoteOptionEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new VoteOptionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VoteOptionEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new VoteOptionEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VoteOption
    {
        return new VoteOption();
    }
}
