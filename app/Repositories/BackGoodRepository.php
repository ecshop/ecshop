<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\BackGoodModel;
use App\Models\Entity\BackGood;

class BackGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BackGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BackGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BackGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function save(BackGood $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BackGood
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new BackGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BackGood
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new BackGood();
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
            $output = new BackGood();
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
            $output = new BackGood();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BackGoodModel
    {
        return new BackGoodModel();
    }
}
