<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AdCustom;
use App\Models\Entity\AdCustomEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AdCustomRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdCustomRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdCustomRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdCustomRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AdCustomEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdCustomEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AdCustomEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdCustomEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AdCustomEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdCustom
    {
        return new AdCustom();
    }
}
