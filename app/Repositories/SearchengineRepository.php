<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\SearchengineEntity;
use App\Models\Searchengine;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class SearchengineRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SearchengineRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SearchengineRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SearchengineRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(SearchengineEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?SearchengineEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new SearchengineEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?SearchengineEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new SearchengineEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Searchengine
    {
        return new Searchengine();
    }
}
