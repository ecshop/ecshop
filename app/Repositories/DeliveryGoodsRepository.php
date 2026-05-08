<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\DeliveryGoodsEntity;
use App\Models\DeliveryGoods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class DeliveryGoodsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?DeliveryGoodsRepository $instance = null;

    /**
     * 单例 DeliveryGoodsRepository
     */
    public static function getInstance(): DeliveryGoodsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new DeliveryGoodsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 DeliveryGoodsEntity
     */
    public function saveEntity(DeliveryGoodsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?DeliveryGoodsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new DeliveryGoodsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?DeliveryGoodsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new DeliveryGoodsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('delivery_goods');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new DeliveryGoods;
    }
}
