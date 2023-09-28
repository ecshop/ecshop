<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AuctionLog;
use App\Models\Entity\AuctionLogEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AuctionLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AuctionLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AuctionLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AuctionLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AuctionLogEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AuctionLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AuctionLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AuctionLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AuctionLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AuctionLog
    {
        return new AuctionLog();
    }
}
