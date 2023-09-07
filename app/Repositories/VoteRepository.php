<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\VoteModel;
use App\Models\Entity\Vote;
use App\Repositories\CurdRepository;

class VoteRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VoteRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VoteRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VoteRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveVote(Vote $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnVote(int $id): ?Vote
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Vote();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnVote(array $condition): ?Vote
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Vote();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnVote(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Vote();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnVote(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Vote();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VoteModel
    {
        return new VoteModel();
    }
}
