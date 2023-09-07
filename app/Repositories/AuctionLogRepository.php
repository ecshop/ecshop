<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AuctionLogModel;
use App\Models\Entity\AuctionLog;
use App\Repositories\CurdRepository;

class AuctionLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AuctionLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AuctionLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AuctionLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAuctionLog(AuctionLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAuctionLog(int $id): ?AuctionLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AuctionLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAuctionLog(array $condition): ?AuctionLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AuctionLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAuctionLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AuctionLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAuctionLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AuctionLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AuctionLogModel
    {
        return new AuctionLogModel();
    }
}
