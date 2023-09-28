<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\VolumePriceEntity;
use App\Models\VolumePrice;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class VolumePriceRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VolumePriceRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VolumePriceRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VolumePriceRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(VolumePriceEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?VolumePriceEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new VolumePriceEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?VolumePriceEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new VolumePriceEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VolumePrice
    {
        return new VolumePrice();
    }
}
