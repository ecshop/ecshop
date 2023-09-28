<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Agency;
use App\Models\Entity\AgencyEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AgencyRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AgencyRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AgencyRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AgencyRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AgencyEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AgencyEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AgencyEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AgencyEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AgencyEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Agency
    {
        return new Agency();
    }
}
