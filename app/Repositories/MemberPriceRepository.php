<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\MemberPriceModel;
use App\Models\Entity\MemberPrice;
use App\Repositories\CurdRepository;

class MemberPriceRepository extends CurdRepository implements RepositoryInterface
{
    private static ?MemberPriceRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): MemberPriceRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new MemberPriceRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveMemberPrice(MemberPrice $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnMemberPrice(int $id): ?MemberPrice
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new MemberPrice();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnMemberPrice(array $condition): ?MemberPrice
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new MemberPrice();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnMemberPrice(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new MemberPrice();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnMemberPrice(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new MemberPrice();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): MemberPriceModel
    {
        return new MemberPriceModel();
    }
}
