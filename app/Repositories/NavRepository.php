<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\NavEntity;
use App\Models\Nav;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class NavRepository extends CurdRepository implements RepositoryInterface
{
    private static ?NavRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): NavRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new NavRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(NavEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?NavEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new NavEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?NavEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new NavEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Nav
    {
        return new Nav();
    }
}
