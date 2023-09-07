<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\BackOrderModel;
use App\Models\Entity\BackOrder;
use App\Repositories\CurdRepository;

class BackOrderRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BackOrderRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BackOrderRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BackOrderRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveBackOrder(BackOrder $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnBackOrder(int $id): ?BackOrder
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new BackOrder();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnBackOrder(array $condition): ?BackOrder
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new BackOrder();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnBackOrder(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new BackOrder();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnBackOrder(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new BackOrder();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BackOrderModel
    {
        return new BackOrderModel();
    }
}
