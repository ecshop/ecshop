<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\VolumePriceModel;
use App\Models\Entity\VolumePrice;
use App\Repositories\CurdRepository;

class VolumePriceRepository extends CurdRepository implements RepositoryInterface
{
    private static ?VolumePriceRepository $instance = null;

    /**
     * 单例
     */
    public static function getInstance(): VolumePriceRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new VolumePriceRepository();
        }

        return self::$instance;
    }

    /**
     * 添加
     */
    public function saveVolumePrice(VolumePrice $entity): int
    {
        return $this->save($entity->toArray());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneByIdReturnVolumePrice(int $id): ?VolumePrice
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        $output = new VolumePrice();
        $output->setData($data);

        return $output;
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOneByWhereReturnVolumePrice(array $condition): ?VolumePrice
    {
        $data = $this->findByWhere($condition);
        if (empty($data)) {
            return null;
        }

        $output = new VolumePrice();
        $output->setData($data);

        return $output;
    }

    /**
     * 查询列表
     */
    public function findAllReturnVolumePrice(array $condition = [], string $order = 'id', string $sort = 'asc'): array
    {
        $result = $this->findAll($condition, $order, $sort);
        if (empty($result)) {
            return [];
        }

        foreach ($result as $key => $item) {
            $output = new VolumePrice();
            $output->setData($item);
            $result[$key] = $output;
        }

        return $result;
    }

    /**
     * 分页查询
     */
    public function pageReturnVolumePrice(array $condition, int $page, int $pageSize): array
    {
        $result = $this->page($condition, $page, $pageSize);

        foreach ($result['data'] as $key => $item) {
            $output = new VolumePrice();
            $output->setData($item);
            $result['data'][$key] = $output;
        }

        return $result;
    }

    /**
     * 定义数据数据模型类
     */
    public function model(): VolumePriceModel
    {
        return new VolumePriceModel();
    }
}
