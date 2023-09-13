<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\FriendLinkModel;
use App\Models\Entity\FriendLink;

class FriendLinkRepository extends CurdRepository implements RepositoryInterface
{
    private static ?FriendLinkRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): FriendLinkRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new FriendLinkRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function save(FriendLink $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?FriendLink
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new FriendLink();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?FriendLink
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new FriendLink();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAll(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new FriendLink();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function page(array $condition = [], int $page = 1, int $pageSize = 20): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new FriendLink();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): FriendLinkModel
    {
        return new FriendLinkModel();
    }
}
