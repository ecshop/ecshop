<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\GoodsAttrModel;
use App\Models\Entity\GoodsAttr;
use App\Repositories\CurdRepository;

class GoodsAttrRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsAttrRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsAttrRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsAttrRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveGoodsAttr(GoodsAttr $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnGoodsAttr(int $id): ?GoodsAttr
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsAttr();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnGoodsAttr(array $condition): ?GoodsAttr
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsAttr();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnGoodsAttr(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new GoodsAttr();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnGoodsAttr(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new GoodsAttr();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsAttrModel
    {
        return new GoodsAttrModel();
    }
}
