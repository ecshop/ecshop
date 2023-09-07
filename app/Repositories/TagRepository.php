<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\TagModel;
use App\Models\Entity\Tag;
use App\Repositories\CurdRepository;

class TagRepository extends CurdRepository implements RepositoryInterface
{
    private static ?TagRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): TagRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new TagRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveTag(Tag $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnTag(int $id): ?Tag
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Tag();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnTag(array $condition): ?Tag
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Tag();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnTag(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Tag();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnTag(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Tag();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): TagModel
    {
        return new TagModel();
    }
}
