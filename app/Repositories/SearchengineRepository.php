<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\SearchengineModel;
use App\Models\Entity\Searchengine;
use App\Repositories\CurdRepository;

class SearchengineRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SearchengineRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SearchengineRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SearchengineRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveSearchengine(Searchengine $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnSearchengine(int $id): ?Searchengine
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Searchengine();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnSearchengine(array $condition): ?Searchengine
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Searchengine();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnSearchengine(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Searchengine();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnSearchengine(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Searchengine();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): SearchengineModel
    {
        return new SearchengineModel();
    }
}
