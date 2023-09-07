<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\UserAccountModel;
use App\Models\Entity\UserAccount;
use App\Repositories\CurdRepository;

class UserAccountRepository extends CurdRepository implements RepositoryInterface
{
    private static ?UserAccountRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): UserAccountRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new UserAccountRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveUserAccount(UserAccount $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnUserAccount(int $id): ?UserAccount
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new UserAccount();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnUserAccount(array $condition): ?UserAccount
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new UserAccount();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnUserAccount(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new UserAccount();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnUserAccount(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new UserAccount();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): UserAccountModel
    {
        return new UserAccountModel();
    }
}
