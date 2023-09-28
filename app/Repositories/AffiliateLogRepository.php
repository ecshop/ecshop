<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\AffiliateLog;
use App\Models\Entity\AffiliateLogEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AffiliateLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AffiliateLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AffiliateLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AffiliateLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AffiliateLogEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AffiliateLogEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AffiliateLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AffiliateLogEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AffiliateLogEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AffiliateLog
    {
        return new AffiliateLog();
    }
}
