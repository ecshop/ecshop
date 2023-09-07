<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\VoteLogModel;
use App\Models\Entity\VoteLog;
use App\Repositories\CurdRepository;

class VoteLogRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VoteLogRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VoteLogRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VoteLogRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveVoteLog(VoteLog $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnVoteLog(int $id): ?VoteLog
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new VoteLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnVoteLog(array $condition): ?VoteLog
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new VoteLog();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnVoteLog(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new VoteLog();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnVoteLog(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new VoteLog();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VoteLogModel
    {
        return new VoteLogModel();
    }
}
