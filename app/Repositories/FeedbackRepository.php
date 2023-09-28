<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\FeedbackEntity;
use App\Models\Feedback;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class FeedbackRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FeedbackRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): FeedbackRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FeedbackRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(FeedbackEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?FeedbackEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new FeedbackEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?FeedbackEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new FeedbackEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Feedback
    {
        return new Feedback();
    }
}
