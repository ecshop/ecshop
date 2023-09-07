<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\SessionModel;
use App\Models\Entity\Session;
use App\Repositories\CurdRepository;

class SessionRepository extends CurdRepository implements RepositoryInterface
{
    private static ?SessionRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): SessionRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new SessionRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveSession(Session $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnSession(int $id): ?Session
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new Session();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnSession(array $condition): ?Session
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new Session();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnSession(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new Session();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnSession(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new Session();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): SessionModel
    {
        return new SessionModel();
    }
}
