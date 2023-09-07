<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\OrderActionModel;
use App\Models\Entity\OrderAction;
use App\Repositories\CurdRepository;

class OrderActionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?OrderActionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): OrderActionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new OrderActionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveOrderAction(OrderAction $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnOrderAction(int $id): ?OrderAction
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new OrderAction();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnOrderAction(array $condition): ?OrderAction
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new OrderAction();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnOrderAction(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new OrderAction();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnOrderAction(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new OrderAction();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): OrderActionModel
    {
        return new OrderActionModel();
    }
}
