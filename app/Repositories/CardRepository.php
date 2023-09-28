<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Card;
use App\Models\Entity\CardEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class CardRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CardRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CardRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CardRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(CardEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CardEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new CardEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CardEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new CardEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Card
    {
        return new Card();
    }
}
