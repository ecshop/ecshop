<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\CartEntity;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class CartRepository extends CurdRepository implements RepositoryInterface
{
    private static ?CartRepository $instance = null;

    /**
     * 单例 CartRepository
     */
    public static function getInstance(): CartRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new CartRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 CartEntity
     */
    public function saveEntity(CartEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?CartEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new CartEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?CartEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new CartEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('cart');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Cart;
    }
}
