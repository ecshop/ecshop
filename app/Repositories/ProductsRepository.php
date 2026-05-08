<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\ProductsEntity;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Juling\Foundation\Contracts\RepositoryInterface;
use Juling\Foundation\Repositories\CurdRepository;

class ProductsRepository extends CurdRepository implements RepositoryInterface
{
    private static ?ProductsRepository $instance = null;

    /**
     * 单例 ProductsRepository
     */
    public static function getInstance(): ProductsRepository
    {
        if (is_null(self::$instance)) {
            self::$instance = new ProductsRepository;
        }

        return self::$instance;
    }

    /**
     * 添加 ProductsEntity
     */
    public function saveEntity(ProductsEntity $entity): int
    {
        return $this->save($entity->toEntity());
    }

    /**
     * 按照ID查询返回对象
     */
    public function findOneById(int $id): ?ProductsEntity
    {
        $data = $this->findById($id);
        if (empty($data)) {
            return null;
        }

        return new ProductsEntity($data);
    }

    /**
     * 按照条件查询返回对象
     */
    public function findOne(array $condition = []): ?ProductsEntity
    {
        $data = $this->find($condition);
        if (empty($data)) {
            return null;
        }

        return new ProductsEntity($data);
    }

    /**
     * 定义数据表查询构造器
     */
    public function builder(): Builder
    {
        return DB::table('products');
    }

    /**
     * 定义数据表模型类
     */
    public function model(): Model
    {
        return new Products;
    }
}
