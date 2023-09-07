<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\KeywordModel;
use App\Models\Entity\Keyword;
use App\Repositories\CurdRepository;

class KeywordRepository extends CurdRepository implements RepositoryInterface
{
    private static ?KeywordRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): KeywordRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new KeywordRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveKeyword(Keyword $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnKeyword(int $id): ?Keyword
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Keyword();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnKeyword(array $condition): ?Keyword
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Keyword();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnKeyword(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Keyword();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnKeyword(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Keyword();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): KeywordModel
    {
        return new KeywordModel();
    }
}
