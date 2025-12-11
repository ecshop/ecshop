<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\ProductEntity;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class ProductRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ProductRepository $instance = null;

    /**
     * 单例 ProductRepository
     */
    public static function getInstance(): ProductRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ProductRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 ProductEntity
     */
    public function saveEntity(ProductEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ProductEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new ProductEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ProductEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new ProductEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('product');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Product;
    }
}
