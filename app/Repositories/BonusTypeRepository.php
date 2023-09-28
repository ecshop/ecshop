<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\BonusTypeModel;
use App\Models\Entity\BonusType;

class BonusTypeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BonusTypeRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BonusTypeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BonusTypeRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function save(BonusType $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BonusType
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new BonusType();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BonusType
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new BonusType();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAll(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new BonusType();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function page(array $condition = [], int $page = 1, int $pageSize = 20): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new BonusType();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BonusTypeModel
    {
        return new BonusTypeModel();
    }
}
