<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\ExchangeGoodModel;
use App\Models\Entity\ExchangeGood;
use App\Repositories\CurdRepository;

class ExchangeGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ExchangeGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): ExchangeGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ExchangeGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveExchangeGood(ExchangeGood $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnExchangeGood(int $id): ?ExchangeGood
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new ExchangeGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnExchangeGood(array $condition): ?ExchangeGood
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new ExchangeGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnExchangeGood(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new ExchangeGood();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnExchangeGood(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new ExchangeGood();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): ExchangeGoodModel
    {
        return new ExchangeGoodModel();
    }
}
