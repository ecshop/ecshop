<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\VirtualCardEntity;
use App\Models\VirtualCard;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class VirtualCardRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VirtualCardRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VirtualCardRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VirtualCardRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(VirtualCardEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VirtualCardEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new VirtualCardEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VirtualCardEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new VirtualCardEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VirtualCard
    {
        return new VirtualCard();
    }
}
