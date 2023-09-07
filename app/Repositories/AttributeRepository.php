<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AttributeModel;
use App\Models\Entity\Attribute;
use App\Repositories\CurdRepository;

class AttributeRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AttributeRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AttributeRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AttributeRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAttribute(Attribute $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAttribute(int $id): ?Attribute
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Attribute();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAttribute(array $condition): ?Attribute
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Attribute();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAttribute(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Attribute();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAttribute(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Attribute();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AttributeModel
    {
        return new AttributeModel();
    }
}
