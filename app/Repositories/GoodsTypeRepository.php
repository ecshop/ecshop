<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\GoodsTypeModel;
use App\Models\Entity\GoodsType;
use App\Repositories\CurdRepository;

class GoodsTypeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsTypeRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsTypeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsTypeRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveGoodsType(GoodsType $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnGoodsType(int $id): ?GoodsType
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsType();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnGoodsType(array $condition): ?GoodsType
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsType();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnGoodsType(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new GoodsType();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnGoodsType(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new GoodsType();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsTypeModel
    {
        return new GoodsTypeModel();
    }
}
