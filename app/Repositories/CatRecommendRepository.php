<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\CatRecommendModel;
use App\Models\Entity\CatRecommend;
use App\Repositories\CurdRepository;

class CatRecommendRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CatRecommendRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): CatRecommendRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CatRecommendRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveCatRecommend(CatRecommend $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnCatRecommend(int $id): ?CatRecommend
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new CatRecommend();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnCatRecommend(array $condition): ?CatRecommend
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new CatRecommend();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnCatRecommend(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new CatRecommend();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnCatRecommend(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new CatRecommend();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): CatRecommendModel
    {
        return new CatRecommendModel();
    }
}
