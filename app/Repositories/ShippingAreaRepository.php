<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\ShippingAreaModel;
use App\Models\Entity\ShippingArea;

class ShippingAreaRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ShippingAreaRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ShippingAreaRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ShippingAreaRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function save(ShippingArea $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ShippingArea
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new ShippingArea();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ShippingArea
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new ShippingArea();
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
            $output = new ShippingArea();
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
            $output = new ShippingArea();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ShippingAreaModel
    {
        return new ShippingAreaModel();
    }
}
