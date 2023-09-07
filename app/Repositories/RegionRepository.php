<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\RegionModel;
use App\Models\Entity\Region;
use App\Repositories\CurdRepository;

class RegionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): RegionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveRegion(Region $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnRegion(int $id): ?Region
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Region();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnRegion(array $condition): ?Region
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Region();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnRegion(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Region();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnRegion(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Region();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): RegionModel
    {
        return new RegionModel();
    }
}
