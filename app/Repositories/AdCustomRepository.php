<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\AdCustomModel;
use App\Models\Entity\AdCustom;
use App\Repositories\CurdRepository;

class AdCustomRepository extends CurdRepository implements RepositoryInterface
{
    private static ?AdCustomRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): AdCustomRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdCustomRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveAdCustom(AdCustom $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnAdCustom(int $id): ?AdCustom
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new AdCustom();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnAdCustom(array $condition): ?AdCustom
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new AdCustom();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnAdCustom(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new AdCustom();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnAdCustom(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new AdCustom();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): AdCustomModel
    {
        return new AdCustomModel();
    }
}
