<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\BookingGoodsEntity;
use App\Models\BookingGoods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class BookingGoodsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?BookingGoodsRepository $instance = null;

    /**
     * 单例 BookingGoodsRepository
     */
    public static function getInstance(): BookingGoodsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new BookingGoodsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 BookingGoodsEntity
     */
    public function saveEntity(BookingGoodsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?BookingGoodsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new BookingGoodsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?BookingGoodsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new BookingGoodsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('booking_goods');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new BookingGoods;
    }
}
