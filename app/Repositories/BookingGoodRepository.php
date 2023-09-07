<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\BookingGoodModel;
use App\Models\Entity\BookingGood;
use App\Repositories\CurdRepository;

class BookingGoodRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BookingGoodRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): BookingGoodRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BookingGoodRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveBookingGood(BookingGood $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnBookingGood(int $id): ?BookingGood
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new BookingGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnBookingGood(array $condition): ?BookingGood
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new BookingGood();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnBookingGood(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new BookingGood();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnBookingGood(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new BookingGood();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): BookingGoodModel
    {
        return new BookingGoodModel();
    }
}
