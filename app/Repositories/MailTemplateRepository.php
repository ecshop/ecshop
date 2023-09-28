<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\MailTemplateEntity;
use App\Models\MailTemplate;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class MailTemplateRepository extends CurdRepository implements RepositoryInterface
{
    private static ?MailTemplateRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): MailTemplateRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new MailTemplateRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(MailTemplateEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?MailTemplateEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new MailTemplateEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?MailTemplateEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new MailTemplateEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): MailTemplate
    {
        return new MailTemplate();
    }
}
