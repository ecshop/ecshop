<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\PaymentEntity;
use App\Models\Payment;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class PaymentRepository extends CurdRepository implements RepositoryInterface
{
    private static ?PaymentRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): PaymentRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new PaymentRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(PaymentEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?PaymentEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new PaymentEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?PaymentEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new PaymentEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Payment
    {
        return new Payment();
    }
}
