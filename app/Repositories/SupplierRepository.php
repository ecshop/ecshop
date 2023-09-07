<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\SupplierModel;
use App\Models\Entity\Supplier;
use App\Repositories\CurdRepository;

class SupplierRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SupplierRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SupplierRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SupplierRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveSupplier(Supplier $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnSupplier(int $id): ?Supplier
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Supplier();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnSupplier(array $condition): ?Supplier
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Supplier();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnSupplier(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Supplier();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnSupplier(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Supplier();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): SupplierModel
    {
        return new SupplierModel();
    }
}
