<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\ShippingModel;
use App\Models\Entity\Shipping;
use App\Repositories\CurdRepository;

class ShippingRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ShippingRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ShippingRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ShippingRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveShipping(Shipping $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnShipping(int $id): ?Shipping
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Shipping();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnShipping(array $condition): ?Shipping
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Shipping();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnShipping(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Shipping();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnShipping(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Shipping();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ShippingModel
    {
        return new ShippingModel();
    }
}
