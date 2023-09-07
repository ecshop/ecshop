<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AdPositionModel;
use App\Models\Entity\AdPosition;
use App\Repositories\CurdRepository;

class AdPositionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdPositionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdPositionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdPositionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAdPosition(AdPosition $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAdPosition(int $id): ?AdPosition
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AdPosition();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAdPosition(array $condition): ?AdPosition
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AdPosition();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAdPosition(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AdPosition();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAdPosition(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AdPosition();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdPositionModel
    {
        return new AdPositionModel();
    }
}
