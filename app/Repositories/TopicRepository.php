<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\TopicModel;
use App\Models\Entity\Topic;

class TopicRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TopicRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): TopicRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TopicRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function save(Topic $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?Topic
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Topic();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?Topic
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Topic();
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
            $output = new Topic();
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
            $output = new Topic();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): TopicModel
    {
        return new TopicModel();
    }
}
