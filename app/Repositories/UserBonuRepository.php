<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\UserBonuModel;
use App\Models\Entity\UserBonu;
use App\Repositories\CurdRepository;

class UserBonuRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserBonuRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserBonuRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserBonuRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveUserBonu(UserBonu $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnUserBonu(int $id): ?UserBonu
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new UserBonu();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnUserBonu(array $condition): ?UserBonu
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new UserBonu();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnUserBonu(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new UserBonu();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnUserBonu(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new UserBonu();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): UserBonuModel
    {
        return new UserBonuModel();
    }
}
