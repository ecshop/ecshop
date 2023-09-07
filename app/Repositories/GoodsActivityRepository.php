<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\GoodsActivityModel;
use App\Models\Entity\GoodsActivity;
use App\Repositories\CurdRepository;

class GoodsActivityRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsActivityRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsActivityRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsActivityRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveGoodsActivity(GoodsActivity $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnGoodsActivity(int $id): ?GoodsActivity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsActivity();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnGoodsActivity(array $condition): ?GoodsActivity
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsActivity();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnGoodsActivity(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new GoodsActivity();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnGoodsActivity(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new GoodsActivity();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsActivityModel
    {
        return new GoodsActivityModel();
    }
}
