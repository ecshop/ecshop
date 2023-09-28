<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CatRecommend;
use App\Models\Entity\CatRecommendEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class CatRecommendRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CatRecommendRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CatRecommendRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CatRecommendRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(CatRecommendEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CatRecommendEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new CatRecommendEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CatRecommendEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new CatRecommendEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): CatRecommend
    {
        return new CatRecommend();
    }
}
