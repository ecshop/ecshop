<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\EmailListModel;
use App\Models\Entity\EmailList;
use App\Repositories\CurdRepository;

class EmailListRepository extends CurdRepository implements RepositoryInterface
{
    private static ?EmailListRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): EmailListRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new EmailListRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveEmailList(EmailList $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnEmailList(int $id): ?EmailList
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new EmailList();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnEmailList(array $condition): ?EmailList
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new EmailList();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnEmailList(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new EmailList();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnEmailList(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new EmailList();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): EmailListModel
    {
        return new EmailListModel();
    }
}
