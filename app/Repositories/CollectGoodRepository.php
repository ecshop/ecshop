<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\CollectGoodModel;
use App\Models\Entity\CollectGood;
use App\Repositories\CurdRepository;

class CollectGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CollectGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CollectGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CollectGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveCollectGood(CollectGood $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnCollectGood(int $id): ?CollectGood
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new CollectGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnCollectGood(array $condition): ?CollectGood
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new CollectGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnCollectGood(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new CollectGood();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnCollectGood(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new CollectGood();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): CollectGoodModel
    {
        return new CollectGoodModel();
    }
}
