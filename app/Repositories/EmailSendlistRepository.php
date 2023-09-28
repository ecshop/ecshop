<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\EmailSendlist;
use App\Models\Entity\EmailSendlistEntity;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class EmailSendlistRepository extends CurdRepository implements RepositoryInterface
{
    private static ?EmailSendlistRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): EmailSendlistRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new EmailSendlistRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(EmailSendlistEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?EmailSendlistEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new EmailSendlistEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?EmailSendlistEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new EmailSendlistEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): EmailSendlist
    {
        return new EmailSendlist();
    }
}
