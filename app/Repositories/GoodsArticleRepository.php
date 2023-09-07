<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\GoodsArticleModel;
use App\Models\Entity\GoodsArticle;
use App\Repositories\CurdRepository;

class GoodsArticleRepository extends CurdRepository implements RepositoryInterface
{
    private static ?GoodsArticleRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): GoodsArticleRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new GoodsArticleRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveGoodsArticle(GoodsArticle $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnGoodsArticle(int $id): ?GoodsArticle
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsArticle();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnGoodsArticle(array $condition): ?GoodsArticle
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new GoodsArticle();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnGoodsArticle(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new GoodsArticle();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnGoodsArticle(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new GoodsArticle();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): GoodsArticleModel
    {
        return new GoodsArticleModel();
    }
}
