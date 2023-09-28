<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\TemplateEntity;
use App\Models\Template;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class TemplateRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TemplateRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): TemplateRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TemplateRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(TemplateEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?TemplateEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new TemplateEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?TemplateEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new TemplateEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): Template
    {
        return new Template();
    }
}
