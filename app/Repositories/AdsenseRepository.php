<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Adsense;
use App\Models\Entity\AdsenseEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class AdsenseRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdsenseRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdsenseRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdsenseRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(AdsenseEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?AdsenseEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new AdsenseEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?AdsenseEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new AdsenseEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Adsense
    {
        return new Adsense();
    }
}
