<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AreaRegionModel;
use App\Models\Entity\AreaRegion;
use App\Repositories\CurdRepository;

class AreaRegionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AreaRegionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AreaRegionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AreaRegionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAreaRegion(AreaRegion $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAreaRegion(int $id): ?AreaRegion
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AreaRegion();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAreaRegion(array $condition): ?AreaRegion
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AreaRegion();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAreaRegion(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AreaRegion();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAreaRegion(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AreaRegion();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AreaRegionModel
    {
        return new AreaRegionModel();
    }
}
