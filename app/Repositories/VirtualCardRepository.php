<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\VirtualCardModel;
use App\Models\Entity\VirtualCard;
use App\Repositories\CurdRepository;

class VirtualCardRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VirtualCardRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VirtualCardRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VirtualCardRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveVirtualCard(VirtualCard $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnVirtualCard(int $id): ?VirtualCard
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new VirtualCard();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnVirtualCard(array $condition): ?VirtualCard
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new VirtualCard();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnVirtualCard(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new VirtualCard();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnVirtualCard(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new VirtualCard();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VirtualCardModel
    {
        return new VirtualCardModel();
    }
}
