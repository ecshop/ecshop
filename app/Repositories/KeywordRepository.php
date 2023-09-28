<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\KeywordEntity;
use App\Models\Keyword;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class KeywordRepository extends CurdRepository implements RepositoryInterface
{
    private static ?KeywordRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): KeywordRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new KeywordRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(KeywordEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?KeywordEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new KeywordEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?KeywordEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new KeywordEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Keyword
    {
        return new Keyword();
    }
}
