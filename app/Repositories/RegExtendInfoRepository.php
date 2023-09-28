<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Entity\RegExtendInfoEntity;
use App\Models\RegExtendInfo;
use Focite\Generator\Contracts\RepositoryInterface;
use Focite\Generator\Repositories\CurdRepository;

class RegExtendInfoRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegExtendInfoRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): RegExtendInfoRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegExtendInfoRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEntity(RegExtendInfoEntity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?RegExtendInfoEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $entity = new RegExtendInfoEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?RegExtendInfoEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        $entity = new RegExtendInfoEntity();
        $entity->setData($data);

        return $entity;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): RegExtendInfo
    {
        return new RegExtendInfo();
    }
}
