<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\RegFieldModel;
use App\Models\Entity\RegField;
use App\Repositories\CurdRepository;

class RegFieldRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegFieldRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): RegFieldRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegFieldRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveRegField(RegField $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnRegField(int $id): ?RegField
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new RegField();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnRegField(array $condition): ?RegField
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new RegField();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnRegField(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new RegField();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnRegField(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new RegField();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): RegFieldModel
    {
        return new RegFieldModel();
    }
}
