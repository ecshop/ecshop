<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\MemberPriceEntity;
use App\Models\MemberPrice;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class MemberPriceRepository extends CurdRepository implements RepositoryInterface
{
    private static ?MemberPriceRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): MemberPriceRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new MemberPriceRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(MemberPriceEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?MemberPriceEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new MemberPriceEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?MemberPriceEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new MemberPriceEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): MemberPrice
    {
        return new MemberPrice();
    }
}
