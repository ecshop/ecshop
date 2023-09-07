<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\GoodModel;
use App\Models\Entity\Good;
use App\Repositories\CurdRepository;

class GoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveGood(Good $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnGood(int $id): ?Good
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Good();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnGood(array $condition): ?Good
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Good();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnGood(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Good();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnGood(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Good();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodModel
    {
        return new GoodModel();
    }
}
