<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\RegExtendInfoModel;
use App\Models\Entity\RegExtendInfo;
use App\Repositories\CurdRepository;

class RegExtendInfoRepository extends CurdRepository implements RepositoryInterface
{
    private static ?RegExtendInfoRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): RegExtendInfoRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new RegExtendInfoRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveRegExtendInfo(RegExtendInfo $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnRegExtendInfo(int $id): ?RegExtendInfo
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new RegExtendInfo();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnRegExtendInfo(array $condition): ?RegExtendInfo
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new RegExtendInfo();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnRegExtendInfo(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new RegExtendInfo();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnRegExtendInfo(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new RegExtendInfo();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): RegExtendInfoModel
    {
        return new RegExtendInfoModel();
    }
}
