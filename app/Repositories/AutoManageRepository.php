<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AutoManage;
use App\Models\Entity\AutoManageEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AutoManageRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AutoManageRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AutoManageRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AutoManageRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AutoManageEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AutoManageEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AutoManageEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AutoManageEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AutoManageEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AutoManage
    {
        return new AutoManage();
    }
}
