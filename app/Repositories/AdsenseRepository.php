<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AdsenseModel;
use App\Models\Entity\Adsense;

class AdsenseRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdsenseRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdsenseRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdsenseRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function save(Adsense $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?Adsense
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Adsense();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?Adsense
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Adsense();
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
            $output = new Adsense();
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
            $output = new Adsense();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdsenseModel
    {
        return new AdsenseModel();
    }
}
