<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\EmailList;
use App\Models\Entity\EmailListEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class EmailListRepository extends CurdRepository implements RepositoryInterface
{
    private static ?EmailListRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): EmailListRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new EmailListRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(EmailListEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?EmailListEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new EmailListEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?EmailListEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new EmailListEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): EmailList
    {
        return new EmailList();
    }
}
